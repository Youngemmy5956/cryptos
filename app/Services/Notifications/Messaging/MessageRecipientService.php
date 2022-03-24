<?php

namespace App\Services\Notifications\Messaging;

use App\Models\Recipient;

class MessageRecipientService
{
    public static function create($data)
    {
        return Recipient::create($data);
    }
}
