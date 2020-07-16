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
    public function index(){
        $searchdata = request('search');
        // dd($searchdata);
        if($searchdata != ""){
            $yearofservice = Yearofservice::all();
            $ads = Ads::all();
            $search = Member::where('mem_name', 'like', '%'.$searchdata.'%')
                            ->orwhere('mem_position', 'like', '%' .$searchdata. '%')->paginate();
                            // dd($search);
            $search_count = count($search);
            
            return view('frontend.search.result', compact('search','search_count','searchdata', 'yearofservice', 'ads'));
        }else{
            $searchdata = request('search');
            $yearofservice = Yearofservice::all();
            $ads = Ads::all();
            return view('frontend.search.result', compact('searchdata', 'yearofservice', 'ads'));
        }
    }
}
