<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Ads;
use App\Yearofservice;

class MemberController extends Controller
{
    public function index(){
        $member = Member::inRandomOrder()->limit(15)->get();
        $ads = Ads::all();
        $yearofservice = Yearofservice::orderBy('start_year', 'asc')->get();
        return view('frontend.member.index', compact('member', 'yearofservice', 'ads'));
    }
    
    public function show($id){
        $member = Member::find($id);
        $mem = Member::inRandomOrder()->limit(30)->get();
        $ads = Ads::all();
        return view('frontend.member.readmore', compact('member', 'ads', 'mem'));
    }

    public function oldmember($id){
        $oldmember = Member::where('year_id', $id)->get();
        $yearofservice = Yearofservice::find($id);
        $ads = Ads::all();
        return view('frontend.member.old', compact('oldmember', 'yearofservice', 'ads'));
    }
}
