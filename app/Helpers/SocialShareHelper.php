<?php

namespace App\Helpers;

use App\Models\Post;

class SocialShareHelper
{

    public function getLink($platform , $url)
    {
        $url = urlencode($url);
        if($platform == "facebook"){
            $link = $this->shareOnFacebook($url);
        }
        if($platform == "instagram"){
            $link = $this->shareOnInstagram($url);
        }
        if($platform == "whatsapp"){
            $link = $this->shareOnWhatsapp($url);
        }
        return $link;
    }

    public function shareOnFacebook($url)
    {
        return "https://web.facebook.com/sharer.php?u=$url";
    }
    public function shareOnInstagram($url)
    {
        return "https://web.facebook.com/sharer.php?u=$url";
    }

    public function shareOnWhatsapp($url)
    {
        return "https://web.facebook.com/sharer.php?u=$url";
    }
}
