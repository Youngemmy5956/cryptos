<?php

namespace App\Constants\Social;

class RoomConstants
{

    const LOGO_PATH = "rooms/logos";

    const MAX_CAPACITY = 1000;


    const PRIVACY_PRIVATE = "PRIVATE";
    const PRIVACY_PUBLIC = "PUBLIC";

    const TYPE_CHANNEL = "CHANNEL";
    const TYPE_GROUP = "GROUP";

    const STATUS_CLOSED = "CLOSED";
    const STATUS_OPEN = "OPEN";


    const TYPE_OPTIONS = [
        self::TYPE_GROUP
    ];

    const PRIVACY_OPTIONS = [
        self::PRIVACY_PUBLIC
    ];

    const STATUS_OPTIONS = [
        self::STATUS_OPEN
    ];


    const MESSAGES_PAGINATION = 50;
    const PARTICIPANTS_PAGINATION = 50;


}
