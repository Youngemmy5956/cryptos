<?php

namespace App\Services\Notifications\Messaging;

use App\Models\Message;
use App\Services\Notifications\AppMailerService;

class MessageCsvService
{
    public static function send($message_id,  $recipients_csv,  array $send_via)
    {
        $message = Message::find($message_id);
        $send_email = in_array("email", $send_via);
        $send_sms = in_array("sms", $send_via);

        $batch_no = getRandomToken(6);

        $file_path = putFileInPrivateStorage($recipients_csv, "temp");
        $handle = fopen(storage_path("app/".$file_path), "r");
        for ($i = 0; $row = fgetcsv($handle); ++$i) {
            if($i == 0){
                continue;
            }
            $name = $row[0];
            $email = $row[1];
            $phone = $row[2];

            $message_body = str_replace(["{{name}}"], $name, $message->body);

            $recipient_data = [
                "batch_no" => $batch_no,
                "message_id" => $message->id,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "message" => $message_body,
                "user_id" => null,
                "via_email" => $send_email,
                "via_in_app" => 0,
                "via_sms" => 0,
            ];



            $message_recipient = MessageRecipientService::create($recipient_data);

            if ($send_email && !empty($email)) {
                AppMailerService::send([
                    "data" => [
                        "name" => $name,
                        "data" =>  [
                            "title" => $message->title,
                            "message" => $message_body,
                            "link" => null,
                        ],
                    ],
                    "to" => $email,
                    "template" => "emails.general.messaging",
                    "subject" => $message->title,
                ]);
            }

            if ($send_sms && !empty($phone)) {
                $message_recipient->update([
                    "via_sms" => 1
                ]);
            }
        }
        fclose($handle);
        deleteFileFromPrivateStorage($file_path);

        $message->update([
            "status" => "Sent"
        ]);
    }
}
