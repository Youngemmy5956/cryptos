<?php

namespace App\Services\System\Notifications;

use App\Exceptions\System\Notifications\WebPusheNotificationException;
use App\Helpers\EncryptionHelper;
use App\Models\PushNotificationSubscription;
use App\Services\System\ExceptionService;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class WebPushNotificationService
{

    public static function subscribe($method, $data): PushNotificationSubscription
    {
        $fingerprint =  $data["fingerprint"] ?? null;
        unset( $data["fingerprint"]);

        $subscriber = new PushNotificationSubscription;
        if ($method == "DELETE") {
            PushNotificationSubscription::where(["authToken" => $fingerprint])->delete();
        } else {
            $data["user_id"] = auth()->id();
            $subscriber = PushNotificationSubscription::where(["authToken" => $fingerprint])->first();
            if (!empty($subscriber)) {
                $subscriber->update($data);
                $subscriber->refresh();
            } else {
                $subscriber = PushNotificationSubscription::create($data);
            }
        }
        return $subscriber;
    }

    public static function notify($push_subscription_id, $title, $body, array $meta_data = [])
    {
        $subscriber = PushNotificationSubscription::find($push_subscription_id);
        if (empty($subscriber)) {
            return false;
        }

        $data = [
            "endpoint" => $subscriber->endpoint,
            "authToken" => $subscriber->authToken,
            "publicKey" => $subscriber->publicKey,
            "contentEncoding" => $subscriber->contentEncoding
        ];
        $subscription = Subscription::create($data);

        $auth = array(
            'VAPID' => array(
                'subject' => url("/"),
                'publicKey' => file_get_contents(base_path() . '/keys/public_key.txt'), // don't forget that your public key also lives in app.js
                'privateKey' => file_get_contents(base_path() . '/keys/private_key.txt'), // in the real world, this would be in a secret file
            ),
        );

        $webPush = new WebPush($auth);

        $report = $webPush->sendOneNotification(
            $subscription,
            json_encode([
                "title" => $title,
                "body" => $body,
                "url" => $meta_data["url"] ?? url("/"),
                "badge" => $meta_data["badge"] ?? null,
                "icon" => $meta_data["icon"] ?? url("/logo.png")
            ])

        );

        // handle eventual errors here, and remove the subscription from your server if it is expired
        $endpoint = $report->getRequest()->getUri()->__toString();

        if (!$report->isSuccess()) {
            $excpetion = new WebPusheNotificationException("[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}");
            ExceptionService::log($excpetion);
            return false;
        }
        return true;
    }


    public static function notifyByUserId($user_id, $title, $body, array $meta_data = [])
    {
        $subscriptions = PushNotificationSubscription::where("user_id", $user_id)->pluck("id");
        foreach ($subscriptions as $id) {
            self::notify($id, $title, $body, $meta_data);
        }
    }


    // public static function notifyAll($title, $body,  array $meta_data = [])
    // {
    //     $subscriptions = PushNotificationSubscription::latest("updated_at")->distinct("user_id")->pluck("id");
    //     foreach ($subscriptions as $id) {
    //         self::notify($id, $title, $body, $meta_data);
    //     }
    // }
}
