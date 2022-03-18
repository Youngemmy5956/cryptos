<?php
namespace App\Helpers;

class MetaData{

    public $title;
    public $description;
    public $keywords;
    public $author;
    public $publisher;
    public $copyright;
    public $page_topic;
    public $page_type;
    public $audience;

    // <!__  Essential META Tags __>
    public $og_site_name;
    public $og_title;
    public $og_description;
    public $og_image;
    public $og_url;
    public $twitter_card;
    public $twitter_image_alt;

    public function setAttribute($name , $value){
        $this->$name = $value;
        return $this;
    }

    public function generate(){
        $object_array = (array) $this;

        $class_variables =  get_class_vars(get_class($this));
        $merged_data = [];

        foreach ($class_variables as $key => $value) {
            $merged_data[$key] = $object_array[$key] ?? null;
        }

        return $merged_data;
    }
}

