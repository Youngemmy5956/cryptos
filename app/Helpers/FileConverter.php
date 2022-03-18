<?php
namespace App\Helpers;

use DOMDocument;
use Illuminate\Support\Facades\Storage;

class FileConverter
{
    /** Parses a base 64 string to image and returns file name
     * @param string base64 string
     * @param string storage string
     */
    public function base64ToPng($base64Img, $storage_path)
    {
        $image_parts = explode(";base64,", $base64Img);
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.png';
        $relative_file_path = $storage_path . '/' . $filename;
        Storage::disk('local')->put($relative_file_path, $image_base64);
        return $relative_file_path;
    }

}
