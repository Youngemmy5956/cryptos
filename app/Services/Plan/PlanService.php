<?php

namespace App\Services\Plan;

use App\Exceptions\PlanException;
use App\Models\Plan;

class PlanService
{

    public static function getById($id): Plan
    {
        $plan = Plan::find($id);
        if (empty($plan)) {
            throw new PlanException("Plan not found");
        }
        return $plan;
    }


}
