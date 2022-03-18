<?php

namespace App\Constants;

class StatusConstants
{
    const ACTIVE = "Active";
    const INACTIVE = "Inactive";
    const CREATED = "Created";
    const STARTED = "Started";
    const APPROVED = "Approved";
    const SUSPENDED = "Suspended";
    const PENDING = "Pending";
    const COMPLETED = "Completed";
    const PROCESSING = "Processing";
    const CANCELLED = "Cancelled";
    const DECLINED = "Declined";
    const ENDED = "Ended";
    const DELETED = "Deleted";

    const ACTIVE_OPTIONS = [
        self::ACTIVE => "Active",
        self::INACTIVE => "Inactive",
    ];

    const PUBLISH_OPTIONS = [
        self::ACTIVE => "Active",
        self::INACTIVE => "Inactive",
    ];


    const WITHDRAWAL_OPTIONS = [
        self::PENDING => "Pending",
        self::PROCESSING => "Processing",
        self::COMPLETED => "Completed",
        self::DECLINED => "Declined",
    ];

    const TRANSACTION_OPTIONS = [
        self::PENDING => "Pending",
        self::COMPLETED => "Completed",
        self::DECLINED => "Declined",
    ];
}

