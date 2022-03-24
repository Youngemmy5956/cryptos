<?php
namespace App\Helpers;

use DOMDocument;

class HtmlHandler
{

    private $htmlDom;
    public function __construct()
    {
        $this->htmlDom = new DOMDocument();
        libxml_use_internal_errors(true);
    }


    public function cleanErrors()
    {
        libxml_clear_errors();
    }

    public function extract($html , $tag)
    {
        $this->htmlDom->loadHTML($html);

        //Extract all img elements / tags from the HTML.
        $imageTags = $this->htmlDom->getElementsByTagName('img');
        //Create an array to add extracted images to.
        $extractedImages = array();
        //Loop through the image tags that DOMDocument found.
        foreach ($imageTags as $imageTag) {
            //Get the src attribute of the image.
            $imgSrc = $imageTag->getAttribute('src');
            //Get the alt text of the image.
            $altText = $imageTag->getAttribute('alt');
            //Get the title text of the image, if it exists.
            $titleText = $imageTag->getAttribute('title');
            //Add the image details to our $extractedImages array.
            $extractedImages[] = array(
                'src' => $imgSrc,
                'alt' => $altText,
                'title' => $titleText
            );
        }

        // dd($extractedImages);

        // $picture = $fileConverter->parseUploadBase64($raw_picture, $path);
    }

    public function extractImgs($html)
    {
        $this->htmlDom->loadHTML($html);
        //Extract all img elements / tags from the HTML.
        $imageTags = $this->htmlDom->getElementsByTagName('img');
        //Create an array to add extracted images to.
        $extractedImages = array();
        //Loop through the image tags that DOMDocument found.
        foreach ($imageTags as $imageTag) {
            //Get the src attribute of the image.
            $imgSrc = $imageTag->getAttribute('src');
            //Get the alt text of the image.
            $altText = $imageTag->getAttribute('alt');
            //Get the title text of the image, if it exists.
            $titleText = $imageTag->getAttribute('title');
            //Add the image details to our $extractedImages array.
            $extractedImages[] = array(
                'src' => $imgSrc,
                'alt' => $altText,
                'title' => $titleText
            );
        }

        return $extractedImages;
    }
}
