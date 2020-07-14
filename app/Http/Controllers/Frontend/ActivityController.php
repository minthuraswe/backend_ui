<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
use App\Category;
use App\Ads;

class ActivityController extends Controller
{
    public function index(){
        $activity = Activity::all();
        $ads = Ads::all();
        return view('frontend.activity.index', compact('activity', 'ads'));
    }

    public function show($id){
        $activity = Activity::find($id);
        $ads = Ads::all();
        return view('frontend.activity.viewmore', compact('activity', 'ads'));
    }
}
