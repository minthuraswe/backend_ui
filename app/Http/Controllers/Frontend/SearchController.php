<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Post;
use App\Yearofservice;
use App\Ads;

class SearchController extends Controller
{   
    public function member(){
    $searchdata = request('search');
        if($searchdata != ""){
            $yearofservice = Yearofservice::all();
            $ads = Ads::all();
            $search = Member::where('mem_name', 'like', '%'.$searchdata.'%')
                            ->orwhere('mem_position', 'like', '%' .$searchdata. '%')->paginate();
            $search_count = count($search);
            
            return view('frontend.search.result.member', compact('search','search_count','searchdata', 'yearofservice', 'ads'));
        }else{
            $searchdata = request('search');
            $yearofservice = Yearofservice::all();
            $ads = Ads::all();
            return view('frontend.search.result.member', compact('searchdata', 'yearofservice', 'ads'));
        }
    }

    public function post(){
        $searchdata = request('search');
            if($searchdata != ""){
                $yearofservice = Yearofservice::all();
                $ads = Ads::all();
                $search = Post::where('post_title', 'like', '%'.$searchdata.'%')
                                ->orwhere('post_description', 'like', '%' .$searchdata. '%')->paginate();
                $search_count = count($search);
                
                return view('frontend.search.result.post', compact('search','search_count','searchdata', 'yearofservice', 'ads'));
            }else{
                $searchdata = request('search');
                $yearofservice = Yearofservice::all();
                $ads = Ads::all();
                return view('frontend.search.result.post', compact('searchdata', 'yearofservice', 'ads'));
            }
        }
}
