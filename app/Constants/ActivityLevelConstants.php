<?php

namespace App\Constants;

class ActivityLevelConstants
{
    const NOVICE = "Novice";
    const APPRENTICE = "Apprentice";
    const PATHFINDER = "Pathfinder";
    const SAPHHIRE = "Sapphire";
    const ADVENTURER = "Adventurer";
    const SCOUT = "Scout";
    const SCRAPPER = "Scrapper";
    const GALLANT = "Gallant";
    const KNIGHT = "Knight";
    const EXEMPLAR = "Exemplar";
    const CONQUEROR = "Conqueror";
    const PALADIN = "Paladin";
    const HERO = "Hero";
    const CHAMPION = "Champion";
    const LEGEND = "Legend";


    const NEW_REFERRAL = "NEW_REFERRAL";
    const JOINED_FASTEST_FINGER_ROUND = "JOINED_FASTEST_FINGER_ROUND";
    const DAILY_LOGIN = "DAILY_LOGIN";
    const AD_SHARE = "AD_SHARE";
    const STORY_SHARE = "STORY_SHARE";
    const STORY_READ = "STORY_READ";

    const ACTIVITY_TITLES = [
        self::NEW_REFERRAL => "New referral",
        self::JOINED_FASTEST_FINGER_ROUND => "Joined Fastest Finger round",
        self::DAILY_LOGIN => "Daily Login",
        self::STORY_READ => "Story Read",
    ];

    const ACTIVITY_DESCRIPTIONS = [
        self::NEW_REFERRAL => "A new user joined with your referral link or code.",
        self::JOINED_FASTEST_FINGER_ROUND => "You participated in a fastest finger round",
        self::DAILY_LOGIN => "Logged into your account at least once today",
        self::STORY_READ => "Read a story"
    ];

}
