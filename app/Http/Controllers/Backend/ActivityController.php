<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
use App\Category;
use App\Phototitle;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act = Activity::paginate(6);
        return view('activity.index', compact('act'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::orderBy('cat_name')->get();
        $photo = Phototitle::orderBy('photo_name')->get();
        return view('activity.create', compact('cat', 'photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->act_memory; 
        $extension = $request->act_memory; 
        $filename = uniqid().'.'.$extension->getClientOriginalExtension();
        $path = public_path(). '/uploads/';
        $extension->move($path, $filename);

        $act = new Activity;
        $act->act_name = $request->act_name;
        $act->cat_id = $request->cat_id;
        $act->photo_id = $request->photo_id;
        $act->act_memory = $filename;

        $act->save();
        return redirect('/activity');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $act = Activity::find($id);
        $cat = Category::all();
        $photo = Phototitle::all();
        return view('activity.show', compact('act', 'cat', 'photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $act = Activity::find($id);
        $cat = Category::all();
        $photo = Phototitle::all();
        return view('activity.edit', compact('act', 'cat', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $file = $request->act_memory; 
        $extension = $request->act_memory; 
        $filename = uniqid(). '.' . $extension->getClientOriginalExtension();
        $path = public_path(). '/uploads/';
        $extension->move($path, $filename);

        $act = Activity::find($id);

        $act->act_name = $request->act_name;
        $act->cat_id = $request->cat_id;
        $act->photo_id = $request->photo_id;
        $act->act_memory = $filename;

        $act->save();
        return redirect('/activity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
