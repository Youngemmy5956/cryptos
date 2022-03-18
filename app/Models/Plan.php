<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currency_id", "id");
    }

    public function logo()
    {
        return $this->belongsTo(File::class, "logo_id", "id");
    }

    public function logoUrl()
    {
        $logo = $this->logo;
        if (!empty($logo)) {
            return $logo->url();
        }
    }
}
