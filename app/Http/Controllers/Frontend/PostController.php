<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Ads;
use App\User;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('frontend.post.index', compact('post'));
    }

    public function show($id){
        $category = Category::all();
        $post = Post::find($id);
        $admin = Post::with('user')->get();
        $ads = Ads::all();
        $recent = Post::inRandomOrder()->limit(4)->get();
        return view('frontend.post.index', compact('post', 'recent', 'category', 'ads', 'admin'));
    }
    
    public function categoryPost($id){
        $category_post = Post::where('cat_id', $id)->get();
        $cat = Category::find($id);
        $ads = Ads::all();
        return view('frontend.post.category', compact('category_post', 'cat', 'ads'));
    }
}
