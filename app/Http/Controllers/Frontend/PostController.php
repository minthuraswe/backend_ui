<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('frontend.post.index', compact('post'));
    }

    public function show($id){
        $category = Category::all();
        $post = Post::find($id);
        $recent = Post::latest()->paginate(4);
        return view('frontend.post.index', compact('post', 'recent', 'category'));
    }
    
    public function categoryPost($id){
        $category_post = Post::where('cat_id', $id)->get();
        $cat = Category::find($id);
        return view('frontend.post.category', compact('category_post', 'cat'));
    }
}
