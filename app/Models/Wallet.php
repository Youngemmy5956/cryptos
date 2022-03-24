<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    public $guarded = [];

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currency_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function formattedBalance($places = 2)
    {
        return number_format(floor($this->balance * 100) / 100, 2);
    }
}
