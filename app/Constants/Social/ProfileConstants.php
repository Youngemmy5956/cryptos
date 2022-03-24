<?php

namespace App\Constants\Social;

class ProfileConstants
{

    const LOGO_PATH = "rooms/logos";

    const PLATFORM_WHATSAPP = "Whatsapp";
    const PLATFORM_FACEBOOK = "Facebook";
    const PLATFORM_INSTAGRAM = "Instagram";
    const PLATFORM_TWITTER = "Twitter";

    const TYPE_GROUP = "Group";
    const TYPE_CONTACT = "Contact";
    const TYPE_PAGE = "Page";
    const TYPE_PROFILE = "Profile";
    const TYPE_MINE = "Mine";

    const PLATFORMS = [
        self::PLATFORM_FACEBOOK,
        self::PLATFORM_WHATSAPP,
        self::PLATFORM_INSTAGRAM,
        self::PLATFORM_TWITTER,
    ];

    const TYPES = [
        self::TYPE_GROUP,
        self::TYPE_CONTACT,
        self::TYPE_PAGE,
        self::TYPE_PROFILE,
    ];

    const PLAFORM_TYPES = [
        self::PLATFORM_WHATSAPP => [
            self::TYPE_GROUP,
            self::TYPE_CONTACT,
        ],
        self::PLATFORM_FACEBOOK => [
            self::TYPE_GROUP,
            self::TYPE_PAGE,
            self::TYPE_PROFILE,
        ]
    ];


    const PLATFORM_ABBRS = [
        self::PLATFORM_FACEBOOK => "FB",
        self::PLATFORM_WHATSAPP => "WA",
        self::PLATFORM_INSTAGRAM => "IG",
        self::PLATFORM_TWITTER => "TW",
    ];
}
