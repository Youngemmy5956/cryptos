<?php

namespace App\Services\Media;


class ImageService
{
    public static function compress($file_path)
    {
        return \Image::make($file_path)->resize(720, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($file_path, 60);
    }
}
