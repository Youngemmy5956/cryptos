<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function logoUrl()
    {
        $logo = $this->logo;
        if (empty($logo)) {
            $logo = "logo";
        }
        $url = readFileUrl("encrypt", $logo);
        return $url;
    }
}
