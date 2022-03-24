<?php

namespace App\Services\Notifications\Messaging;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessagingNotification;
use Illuminate\Support\Facades\Notification;

class MessageAllService
{
    public static function send($message_id, array $send_via)
    {
        $message = Message::find($message_id);

        $builder = User::orderby("email");

        if (in_array("sms", $send_via)) {
            $builder = $builder->whereNotNull("phone");
        }

        $batch_no = getRandomToken(6);

        $users = $builder->get(["id" ,"first_name", "last_name", "email", "phone"]);
        foreach ($users as $user) {

            $message_body = str_replace(["{{name}}"] , $user->names() , $message->body);


            $recipient_data = [
                "batch_no" => $batch_no,
                "message_id" => $message->id,
                "name" => $user->names(),
                "email" => $user->email,
                "phone" => $user->phone,
                "message" => $message_body,
                "user_id" => $user->id,
                "via_email" => in_array("email", $send_via),
                "via_in_app" => in_array("in_app", $send_via),
                "via_sms" => 0,
            ];

            Notification::sendNow($user, new MessagingNotification(
                [
                    "title" => $message->title,
                    "message" => $message_body,
                    "link" => null,
                ],
                $send_via
            ));
            $message_recipient = MessageRecipientService::create($recipient_data);

            if (in_array("sms", $send_via)) {
                $message_recipient->update([
                    "via_sms" => 1
                ]);
            }

        }

        $message->update([
            "status" => "Sent"
        ]);
    }
}
