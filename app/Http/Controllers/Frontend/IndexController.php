<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Activity;
use App\Post;
use App\Ads;

class IndexController extends Controller
{
    public function index(){
        $member = Member::latest()->limit(3)->get();
        $activity = Activity::latest()->limit(3)->get();
        $post = Post::latest()->limit(3)->get();
        $ads = Ads::all();
        return view('frontend.home.index', compact('member', 'activity', 'post', 'ads'));
    }

    public function about(){
        $ads = Ads::all();
        return view('frontend.home.wwdreadmore', compact('ads'));
    }

    public function contact(){
        $ads = Ads::all();
        return view('frontend.home.contact', compact('ads'));
    }

    public function history(){
        $ads = Ads::all();
        return view('frontend.home.history', compact('ads'));
    }
}
