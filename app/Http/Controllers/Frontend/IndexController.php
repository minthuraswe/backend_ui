<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Activity;
use App\Post;

class IndexController extends Controller
{
    public function index(){
        $member = Member::latest()->limit(3)->get();
        $activity = Activity::latest()->limit(3)->get();
        $post = Post::latest()->limit(3)->get();
        return view('frontend.home.index', compact('member', 'activity', 'post'));
    }
}
