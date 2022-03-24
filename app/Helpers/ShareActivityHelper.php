<?php

namespace App\Helpers;

use App\Models\Post;
use App\Models\ShareActivity;
use App\Models\User;

class ShareActivityHelper
{

    // public function onShare(Post $post)
    // {
    //     if($user = auth()->user()){

    //     }
    // }

    public function onVisit($sharer, $post_id, $is_sponsored)
    {
        $sharer = User::where("ref_code", $sharer)->with("plan")->first();

        // dd(optional($sharer->plan));

        if (!$sharer) {
            return null;
        }

        $user_id = null;
        if ($user = auth()->user()) {
            $user_id = $user->id;

            $count_by_visitor = ShareActivity::where("post_id", $post_id)
                ->where("user_id", $user_id)
                ->count();

            if ($count_by_visitor > 0) {
                return;
            }
        }

        if ($sharer->id == $user_id) {
            return;
        }

        $referrer_url = request()->headers->get('referer');

        if (!empty($referrer_url)) {
            $domain = parse_url($referrer_url)["host"] ?? null;
            $platform = explode(".", $domain)[0] ?? null;
        }

        $count_by_id = ShareActivity::where("post_id", $post_id)
            ->where("sharer_id", $sharer->id)->count();


        $data = [
            "user_id" => $user_id,
            "sharer_id" => $sharer->id,
            "post_id" => $post_id,
            "referrer_url" => $referrer_url,
            "platform" => $platform ?? null,
            "domain" => $domain ?? null,
            "bonus" => optional($sharer->plan)->sponsored_post_bonus ?? 0,
            "is_sponsored" => $is_sponsored,
            "count_by_post" => $count_by_id++
        ];
        ShareActivity::create($data);
    }

    public function creditSharer($sharer)
    {
        $sharer = User::where("ref_code", $sharer)->with("plan")->first();
        if (!$sharer) {
            return null;
        }

        $plan = $sharer->plan;
        if (empty($plan)) {
            return;
        }

        $sharedActivity = ShareActivity::where("sharer_id", $sharer->id)
            ->whereDate("created_at", today())
            ->count();

        if (!$sharedActivity > $plan->sponsored_posts_per_day) {
            Wallet::credit(
                $sharer,
                $plan->sponsored_post_bonus ?? 0,
                "Sponsored post bonus",
                Constants::COMPLETED,
                true,
                true
            );
        }
    }
}
