<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Member;
use App\Activity;
use App\Post;
use App\Phototitle;

class SearchController extends Controller
{
    public function searchCategory(){
        $searchdata = request('search');
        if($searchdata != ""){
            $search = Category::where('cat_name', 'like', '%'.$searchdata.'%')->paginate();
            $search_count = count($search);
            
            return view('category.search', compact('search','search_count','searchdata'));
        }else{
            return view('category.search');
        }
    }

    public function searchMember()
    {
        $searchdata = request('search');
        if($searchdata != ""){
            $search = Member::where('mem_name', 'like', '%'.$searchdata.'%')->paginate();
            $search_count = count($search);
            
            return view('member.search', compact('search','search_count','searchdata'));
        }else{
            return view('member.search');
        }

    }

    public function searchPost()
    {
        $searchdata = request('search');
        if($searchdata != ""){
            $search = Post::where('post_title', 'like', '%'.$searchdata.'%')->paginate();
            $search_count = count($search);
            
            return view('post.search', compact('search','search_count','searchdata'));
        }else{
            return view('post.search');
        }

    }

    public function searchActivity()
    {
        $searchdata = request('search');
        if($searchdata != ""){
            $search = Activity::where('act_name', 'like', '%'.$searchdata.'%')->paginate();
            $search_count = count($search);
            
            return view('activity.search', compact('search','search_count','searchdata'));
        }else{
            return view('activity.search');
        }

    }

    public function searchPhoto()
    {
        $searchdata = request('search');
        if($searchdata != ""){
            $search = Phototitle::where('photo_name', 'like', '%'.$searchdata.'%')
                    ->orwhere('photo_for_what', 'like', '%' . $searchdata . '%')->paginate();
            $search_count = count($search);
            
            return view('photo.search', compact('search','search_count','searchdata'));
        }else{
            return view('photo.search');
        }

    }
}
