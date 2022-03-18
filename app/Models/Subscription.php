<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $casts = [
        'paid_on' => 'datetime:Y-m-d',
        'expires_at' => 'datetime:Y-m-d',
    ];
    public $guarded = ['id'];

    public function plan(){ 
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
}
