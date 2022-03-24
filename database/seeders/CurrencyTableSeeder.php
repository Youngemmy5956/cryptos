<?php

namespace Database\Seeders;

use App\Constants\CurrencyConstants;
use App\Constants\CurrencyOptionConstants;
use App\Constants\StatusConstants;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            // [
            //     "name" => "US Dollar",
            //     "group" => CurrencyConstants::CURRENCY_GROUP,
            //     "type" => CurrencyConstants::DOLLAR_CURRENCY,
            //     "price_per_dollar" => 1,
            //     "short_name" => "USD",
            //     "logo" => "/",
            //     "status" => StatusConstants::ACTIVE,
            // ],
            [
                "name" => "Nigerian Naira",
                "type" => CurrencyConstants::NAIRA_CURRENCY,
                "short_name" => "NGN",
                "logo" => "/",
                "status" => StatusConstants::ACTIVE
            ],
            // [
            //     "name" => "Bronze",
            //     "group" => CurrencyConstants::COIN_GROUP,
            //     "type" => CurrencyConstants::BRONZE,
            //     "price_per_dollar" => 100,
            //     "short_name" => "BZ",
            //     "logo" => "/",
            //     "status" => StatusConstants::ACTIVE
            // ],
            // [
            //     "name" => "Silver",
            //     "group" => CurrencyConstants::COIN_GROUP,
            //     "type" => CurrencyConstants::SILVER,
            //     "price_per_dollar" => 0.1,
            //     "short_name" => "Slv",
            //     "logo" => "/",
            //     "status" => StatusConstants::ACTIVE
            // ],

            // [
            //     "name" => "Bronze",
            //     "group" => CurrencyConstants::COIN_GROUP,
            //     "type" => CurrencyConstants::GOLD,
            //     "price_per_dollar" => 0.001,
            //     "short_name" => "Gd",
            //     "logo" => "/",
            //     "status" => StatusConstants::ACTIVE
            // ],

        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
