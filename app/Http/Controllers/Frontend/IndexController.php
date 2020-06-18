<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Phototitle;
use App\Activity;
use App\Post;

class IndexController extends Controller
{
    public function index(){
        $photo = Phototitle::all();
        $member = Member::latest()->paginate(3);
        $activity = Activity::latest()->paginate(3);
        $post = Post::latest()->paginate(3);
        return view('frontend.home.index', compact('member', 'photo', 'activity', 'post'));
    }
}
