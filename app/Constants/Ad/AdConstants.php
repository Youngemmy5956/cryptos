<?php

namespace App\Constants\Ad;

class AdConstants
{

    const SORT_OPTIONS = [
        "most_popular" => [
            "label" => "Most Popular",
            "column" => "views_count",
            "order" => "desc"
        ],
        "created_at_desc" => [
            "label" => "Most Recent",
            "column" => "created_at",
            "order" => "desc"
        ],
        "created_at_asc" => [
            "label" => "Oldest",
            "column" => "created_at",
            "order" => "asc"
        ],
        "title_asc" => [
            "label" => "Title - Asc",
            "column" => "title",
            "order" => "asc"
        ],
        "title_desc" => [
            "label" => "Title - Desc",
            "column" => "title",
            "order" => "desc"
        ],
    ];
}
