<?php

namespace Database\Seeders;

use App\Constants\CurrencyConstants;
use App\Constants\NetworkConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionConstants;
use App\Models\Plan;
use App\Models\PlanBenefit;
use App\Services\Wallet\CurrencyService;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency_id = CurrencyService::getByType(CurrencyConstants::NAIRA_CURRENCY)->id;
        $data = [
            [
                "currency_id" => $currency_id,
                "price" => 2000,
                "logo_id" => null,
                "name" => "Cadet",
                "description" => null,
                "duration" => 30,
                "status" => StatusConstants::ACTIVE,
            ],
            [
                "currency_id" => $currency_id,
                "price" => 3000,
                "logo_id" => null,
                "name" => "Elite",
                "description" => null,
                "duration" => 30,
                "status" => StatusConstants::ACTIVE,

            ],
            [
                "currency_id" => $currency_id,
                "price" => 10000,
                "logo_id" => null,
                "name" => "Pro",
                "description" => null,
                "duration" => 30,
                "status" => StatusConstants::ACTIVE,
            ],
        ];

        foreach ($data as $plan) {
            Plan::create($$plan);
        }
    }
}
