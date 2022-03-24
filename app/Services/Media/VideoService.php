<?php

namespace App\Services\Media;


class VideoService
{
    public static function capture($file_path , $output_file)
    {
        shell_exec("ffmpeg -ss 00:00:10 -i $file_path -vframes 1 -q:v 2 $output_file");
        return $output_file;
    }
}
