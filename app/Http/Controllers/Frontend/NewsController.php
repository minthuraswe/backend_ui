<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class NewsController extends Controller
{
    public function index(){
        $post = Post::paginate(5);
        $recent = Post::limit(8)->get();
        return view('frontend.news.index', compact('post', 'recent'));
    }
}
