<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function index($id){
        $category = Post::where('cat_id', $id)->get();
        return view('frontend.post.category', compact('category'));
    }
}
