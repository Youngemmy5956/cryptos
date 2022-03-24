<?php

namespace App\Helpers;

use App\Helpers\MetaData;
use App\Models\Ad;
use App\Models\Post;
use App\Models\StoryBook;
use App\Models\StoryBookPage;

class PageMetaData
{

    const DEFAULT_SUFFIX = "- Zinghunt";
    const DEFAULT_KEYWORDS = "blog, crypto, entertainment, earning , earn online , complete survey and earn , earn money with your phone , earn money online, click to earn , earn money 2022";

    static public function getTitle(string $title)
    {
        return $title . " " . self::DEFAULT_SUFFIX;
    }

    static public function indexPage()
    {
        $meta = new MetaData();
        return $meta->setAttribute("title", "One Platform, Multiple Income Streams | Zinghunt")
            ->setAttribute("description", "Zinghunt is an activity based platform, aimed at enriching her users by engaging them in profitable activites daily.")
            ->setAttribute("keywords", self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Confidence")
            ->setAttribute("audience", "Public")
            ->generate();
    }

    static public function contactPage()
    {
        $meta = new MetaData();

        return $meta->setAttribute("title", self::getTitle("Contact Us"))
            ->setAttribute("description", "Rapid contacts")
            ->setAttribute("keywords", self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Confidence")
            ->setAttribute("audience", "Public")
            ->generate();

    }
    static public function about()
    {
        $meta = new MetaData();

        return $meta->setAttribute("title", self::getTitle("About Us"))
            ->setAttribute("description", "About us")
            ->setAttribute("keywords", self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Confidence")
            ->setAttribute("audience", "Public")
            ->generate();

    }

    static public function blogPage($type)
    {
        $meta = new MetaData();
        return $meta->setAttribute("title", self::getTitle(ucfirst($type)))
            ->setAttribute("description", "Blog descrpition")
            ->setAttribute("keywords", self::DEFAULT_KEYWORDS)
            ->generate();
    }

    static public function searchPage()
    {
        $meta = new MetaData();
        return $meta->setAttribute("title", self::getTitle("Search"))
            ->setAttribute("description", "Blog descrpition")
            ->setAttribute("keywords", self::DEFAULT_KEYWORDS)
            ->generate();
    }

    static public function blogDetailsPage(Post $post)
    {
        $meta = new MetaData();
        $title = $post->meta_title ?? $post->title;
        return $meta->setAttribute("title", self::getTitle($title))
            ->setAttribute("description", $post->meta_description)
            ->setAttribute("keywords",$post->meta_keywords ?? self::DEFAULT_KEYWORDS)
            ->setAttribute("author", optional($post->author)->names() ?? "Admin")
            ->setAttribute("page_topic", $post->title)
            ->setAttribute("og_site_name", url("/"))
            ->setAttribute("og_title", $post->title)
            ->setAttribute("og_description", $post->meta_description)
            ->setAttribute("og_image", $post->coverImageUrl())
            ->setAttribute("og_url", $post->detailsUrl())
            ->setAttribute("twitter_card", $post->coverImageUrl())
            ->setAttribute("twitter_image_alt", $post->title)
            ->generate();
    }

    static public function adDetailsPage(Ad $ad)
    {
        $meta = new MetaData();
        $title = $ad->meta_title ?? $ad->title;
        $description = str_limit(strip_tags($ad->description) , 200);
        return $meta->setAttribute("title", self::getTitle($title))
            ->setAttribute("description", $description)
            ->setAttribute("keywords",$ad->meta_keywords ?? $title ?? self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Zinghunt")
            ->setAttribute("page_topic", $ad->title)
            ->setAttribute("og_site_name", url("/"))
            ->setAttribute("og_title", $ad->title)
            ->setAttribute("og_description", $description)
            ->setAttribute("og_image", optional($ad->cover)->url())
            ->setAttribute("og_url", $ad->detailsUrl())
            ->setAttribute("twitter_card", optional($ad->cover)->url())
            ->setAttribute("twitter_image_alt", $ad->title)
            ->generate();
    }


    static public function storyIndexPage()
    {
        $meta = new MetaData();
        return $meta->setAttribute("title", self::getTitle("It`s Storytime"))
            ->setAttribute("description", "Earn money as your write and read stories from all around the world!")
            ->setAttribute("keywords", "story , storybook , story time , bed-time stories , romance stories , fiction , anime , love stories , ". self::DEFAULT_KEYWORDS)
            ->generate();
    }

    static public function storyDetailsPage(StoryBook $story)
    {
        $meta = new MetaData();
        $title = $story->title;
        $description = str_limit(strip_tags($story->description ?? $title) , 200);
        return $meta->setAttribute("title", self::getTitle($title))
            ->setAttribute("description", $description)
            ->setAttribute("keywords",$title ?? self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Zinghunt")
            ->setAttribute("page_topic", $title)
            ->setAttribute("og_site_name", url("/"))
            ->setAttribute("og_title", $title)
            ->setAttribute("og_description", $description)
            ->setAttribute("og_image", optional($story->cover)->url())
            ->setAttribute("og_url", $story->url())
            ->setAttribute("twitter_card", optional($story->cover)->url())
            ->setAttribute("twitter_image_alt", $title)
            ->generate();
    }

    static public function storyPageDetails(StoryBookPage $page)
    {
        $meta = new MetaData();
        $title = $page->sub_title;
        $description = str_limit(strip_tags($page->description ?? $title) , 200);
        return $meta->setAttribute("title", self::getTitle($title))
            ->setAttribute("description", $description)
            ->setAttribute("keywords",$title ?? self::DEFAULT_KEYWORDS)
            ->setAttribute("author", "Zinghunt")
            ->setAttribute("page_topic", $title)
            ->setAttribute("og_site_name", url("/"))
            ->setAttribute("og_title", $title)
            ->setAttribute("og_description", $description)
            ->setAttribute("og_image", optional($page->cover)->url())
            ->setAttribute("og_url", $page->url())
            ->setAttribute("twitter_card", optional($page->cover)->url())
            ->setAttribute("twitter_image_alt", $title)
            ->generate();
    }
}

