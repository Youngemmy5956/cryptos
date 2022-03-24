<?php

namespace App\Constants\Ad;

class AdCategoryConstants
{

    const TEXT_OPTION = "Text";
    const SELECT_OPTION = "Select";
    const CHECK_OPTION = "Checkbox";
    const RADIO_OPTION = "Radio";

    const OPTIONS = [
        self::TEXT_OPTION => "Text",
        self::SELECT_OPTION => "Select",
        self::CHECK_OPTION => "Multiple Options",
        self::RADIO_OPTION => "Single Option",
    ];
}
