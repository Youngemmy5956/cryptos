<?php

namespace App\Models;

use App\Constants\StatusConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currency_id", "id");
    }

    public function scopeTest($query)
    {
        return $query->where('status',  StatusConstants::PENDING)
                ->orWhere('status',  StatusConstants::COMPLETED)
                ->where('status',  StatusConstants::CANCELLED);

    }
}
