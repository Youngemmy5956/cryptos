<?php

namespace App\Helpers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class PostHandler
{
    public function getPostFolder($uuid)
    {
        return "/blog/post/$uuid/";
    }

    public function getPostBodyFileName($uuid)
    {
        return $this->getPostFolder($uuid)."body.txt";
    }


    public function setBodyAttribute($filename, $uuid , $body)
    {
        if (empty($filename) ||  !Storage::disk('local')->exists($filename)) {
            $filename = $this->getPostBodyFileName($uuid);
        }

        $newBody = $this->replaceBase64ImgWithPng($body , $uuid);

        Storage::disk('local')->put($filename, $newBody);
        return $filename;
    }


    public function replaceBase64ImgWithPng($body , $uuid)
    {
        $fileConverter = new FileConverter;
        $htmlHandler = new HtmlHandler;

        $imgTags = $htmlHandler->extractImgs($body);
        foreach ($imgTags as $tag) {
            $src = $tag["src"] ?? "";
            if (
                str_contains($src, "data:image/png;base64") ||
                str_contains($src, "data:image/jpeg;base64") ||
                str_contains($src, "data:image/jpg;base64")
            ) {
                $folder = $this->getPostFolder($uuid);
                $pngPath = $fileConverter->base64ToPng($src, $folder);
                $pngUrl = readFileUrl("encrypt", $pngPath);
                $body = str_replace($src, $pngUrl, $body);
            }
        }
        $htmlHandler->cleanErrors();
        return $body;
    }

    public function getBodyAttribute($value)
    {

        $filename = $value;
        $content = null;
        if (Storage::disk('local')->exists($filename)) {
            $content = Storage::disk('local')->get($filename);
        }

        return $content;
    }

    public function cleanDelete(Post $post)
    {
        $coverImage = $post->coverImage;
        $coverVideo = $post->coverVideo;
        optional($coverImage)->cleanDelete(null , true);
        optional($coverVideo)->cleanDelete(null , true);
        $folder = $this->getPostFolder($post->uuid);
        Storage::deleteDirectory($folder);
        $post->delete();
    }
}
