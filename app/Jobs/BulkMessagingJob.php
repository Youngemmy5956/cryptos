<?php

namespace App\Jobs;

use App\Services\Notifications\Messaging\MessageAllService;
use App\Services\Notifications\Messaging\MessageCsvService;
use App\Services\Notifications\Messaging\MessageGroupService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BulkMessagingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $send_type = $data["send_type"];
        $send_via = $data["send_via"];
        $message_id = $data["message_id"];

        if ($send_type == "all") {
            MessageAllService::send($message_id, $send_via);
        }

        if ($send_type == "group") {
            MessageGroupService::send($message_id, explode(",", $data["recipients_list"]), $send_via);
        }

        if ($send_type == "csv") {
            MessageCsvService::send($message_id, $data["recipients_csv"], $send_via);
        }

    }
}
