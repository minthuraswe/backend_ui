<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
use App\Category;

class ActivityController extends Controller
{
    public function index(){
        $activity = Activity::all();
        return view('frontend.activity.index', compact('activity'));
    }

    public function show($id){
        $activity = Activity::find($id);
        return view('frontend.activity.viewmore', compact('activity'));
    }
}
