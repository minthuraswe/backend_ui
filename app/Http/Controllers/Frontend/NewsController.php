<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Ads;

class NewsController extends Controller
{
    public function index(){
        $post = Post::paginate(5);
        $recent = Post::inRandomOrder()->limit(6)->get();
        $ads = Ads::all();
        return view('frontend.news.index', compact('post', 'recent', 'ads'));
    }
}
