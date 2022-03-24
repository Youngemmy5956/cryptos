<?php

namespace App\Models;

use App\Services\Media\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cleanDelete($id = null, $delete = true)
    {
        $id = $id ?? $this->id;
        FileService::cleanDelete($id, $delete);
    }

    public function url()
    {
        if (!empty($path = $this->path)) {
            return readFileUrl("encrypt", $path);
        }
    }
}
