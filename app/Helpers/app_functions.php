<?php

use App\Constants\AppConstants;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;


/** Returns a random alphanumeric token or number
 * @param int length
 * @param bool  type
 * @return String token
 */
function getRandomToken($length, $typeInt = false)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= strtolower($codeAlphabet);
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet);

    if ($typeInt == true) {
        for ($i = 0; $i < $length; $i++) {
            $token .= rand(0, 9);
        }
        $token = intval($token);
    } else {
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
    }

    return $token;
}

function avatar(User $user){
    
    return $user->pictureUrl();
}

/**Puts file in a public storage */
function putFileInStorage($file, $path)
{
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->storeAs($path, $filename);
    return "$path/$filename";
}

/**Puts file in a private storage */
function putFileInPrivateStorage($file, $path)
{
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    Storage::putFileAs($path, $file, $filename, 'private');
    return "$path/$filename";
}

// function resizeImageandSave($image ,$path , $disk = 'local', $width = 300 , $height = 300){
//     // create new image with transparent background color
//     $background = Image::canvas($width, $height, '#ffffff');

//     // read image file and resize it to 262x54
//     $img = Image::make($image);
//     //Resize image
//     $img->resize($width, $height, function ($constraint) {
//         $constraint->aspectRatio();
//         $constraint->upsize();
//     });

//     // insert resized image centered into background
//     $background->insert($img, 'center');

//     // save
//     $filename = uniqid().'.'.$image->getClientOriginalExtension();
//     $path = $path.'/'.$filename;
//     Storage::disk($disk)->put($path, (string) $background->encode());
//     return $filename;
// }

// Returns full public path
function my_asset($path = null)
{
    return url("/") . env('RESOURCE_PATH') . '/' . $path;
}


/**Gets file from public storage */
function getFileFromStorage($fullpath, $storage = 'storage')
{
    if ($storage == 'storage') {
        return route('read_file', encrypt($fullpath));
    }
    return my_asset($fullpath);
}

/**Deletes file from public storage */
function deleteFileFromStorage($path)
{
    if(file_exists($path)){
        unlink(public_path($path));
    }
}


/**Deletes file from private storage */
function deleteFileFromPrivateStorage($path , $disk = "local")
{
    if(empty($path)){
        return;
    }
    if((explode("/" , $path)[0] ?? "") === "app"){
        $path = str_replace("app/" , "" , $path);
    }

    $exists = Storage::disk($disk)->exists($path);
    if ($exists) {
        Storage::delete($path);
    }
    return $exists;
}


/**Downloads file from private storage */
function downloadFileFromPrivateStorage($path, $name)
{
    $name = $name ?? env('APP_NAME');
    $exists = Storage::disk('local')->exists($path);
    if ($exists) {
        $type = Storage::mimeType($path);
        $ext = explode('.', $path)[1];
        $display_name = $name . '.' . $ext;
        // dd($display_name);
        $headers = [
            'Content-Type' => $type,
        ];

        return Storage::download($path, $display_name, $headers);
    }
    return null;
}

function readPrivateFile($path)
{
}


/**Reads file from private storage */
function getFileFromPrivateStorage($fullpath, $disk = 'local')
{
    if((explode("/" , $fullpath)[0] ?? "") === "app"){
        $fullpath = str_replace("app/" , "" , $fullpath);
    }
    if ($disk == 'public') {
        $disk = null;
    }
    $exists = Storage::disk($disk)->exists($fullpath);
    if ($exists) {
        $fileContents = Storage::disk($disk)->get($fullpath);
        $content = Storage::mimeType($fullpath);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', $content);
        return $response;
    }
    return null;
}



function str_limit($string, $limit = 20, $end  = '...')
{
    return Str::limit(strip_tags($string), $limit, $end);
}



/**Returns file size */
function bytesToHuman($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}


/** Returns File type
 * @return Image || Video || Document
 */
function getFileType(String $type)
{
    $imageTypes = imageMimes();
    if (strpos($imageTypes, $type) !== false) {
        return 'Image';
    }

    $videoTypes = videoMimes();
    if (strpos($videoTypes, $type) !== false) {
        return 'Video';
    }

    $docTypes = docMimes();
    if (strpos($docTypes, $type) !== false) {
        return 'Document';
    }
}

function imageMimes()
{
    return "image/jpeg,image/png,image/jpg,image/svg";
}

function videoMimes()
{
    return "video/x-flv,video/mp4,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi";
}

function docMimes()
{
    return "application/pdf,application/docx,application/doc";
}

function formatTimeToHuman($time)
{
    $seconds =  Carbon::parse(now())->diffInSeconds(Carbon::parse($time), false);
    if ($seconds < 1) {
        return false;
    }
    return formatSecondsToHuman($seconds);
}

function formatDateTimeToHuman($time, $pattern = 'M d , Y h:i:A')
{
    return date($pattern, strtotime($time));
}



function formatSecondsToHuman($seconds)
{
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    $a = $dtF->diff($dtT)->format('%a');
    $h = $dtF->diff($dtT)->format('%h');
    $i = $dtF->diff($dtT)->format('%i');
    $s = $dtF->diff($dtT)->format('%s');
    if ($a > 0) {
        return $dtF->diff($dtT)->format('%a days, %h hrs, %i mins and %s secs');
    } else if ($h > 0) {
        return $dtF->diff($dtT)->format('%h hrs, %i mins ');
    } else if ($i > 0) {
        return $dtF->diff($dtT)->format(' %i mins');
    } else {
        return $dtF->diff($dtT)->format('%s seconds');
    }
}


function slugify($value)
{
    return Str::slug($value);
}


function slugifyReplace($value, $symbol = '-')
{
    return str_replace(' ', $symbol, $value);
}


/**
 * @param $mode = ["encrypt" , "decrypt"]
 * @param $path =
 */
function readFileUrl($mode, $path)
{
    if (strtolower($mode) == "encrypt") {
        $path = base64_encode($path);
        return route("web.read_file", $path);
    }
    return base64_decode($path);
}

function carbon()
{
    return new Carbon();
}


function withDir($dir){
    if(!is_dir($dir)){
        mkdir(trim($dir), 0777, true);
    }
}

function downloadFileFromUrl($url, $path = null , $return_full_path = false)
{
    $fileInfo = pathinfo($url);
    $path = $path ?? storage_path("app/downloads");
    withDir($path);
    $filename = uniqid().".".$fileInfo["extension"];
    $full_path = $path."/".$filename;

    $url_file = fopen ($url, 'rb');
    if ($url_file) {
        $newfile = fopen ($full_path, 'a+');
        if ($newfile) {
            while(!feof($url_file)) {
                fwrite($newfile, fread($url_file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if ($url_file) {
        fclose($url_file);
    }
    if ($newfile) {
        fclose($newfile);
        return $return_full_path ? $full_path : $filename;
    }
    return null;
}



function pillClasses($value)
{
    return AppConstants::PILL_CLASSES[$value] ?? "primary";
}

 function developer(): User
{
    return User::where("email" , AppConstants::SUDO_EMAIL)->first();
}

function isSudo()
{
    return optional(auth()->user())->email == AppConstants::SUDO_EMAIL;
}




function int_format($number, $decimals = 0, $decPoint = '.' , $thousandsSep = ',')
{
    $negation = ($number < 0) ? (-1) : 1;
    $coefficient = 10 ** $decimals;
    $number = $negation * floor((string)(abs($number) * $coefficient)) / $coefficient;
    return number_format($number, $decimals, $decPoint, $thousandsSep);
}
