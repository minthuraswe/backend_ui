<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Phototitle;

class PhototitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Phototitle::paginate(6);
        return view('photo.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->image; 
        $filename = uniqid().'.'.$extension->getClientOriginalExtension();
        $path = public_path(). '/uploads/';
        $extension->move($path, $filename);

        $photo = new Phototitle;
        $photo->photo_name = $request->photo_name;
        $photo->image = $filename;
        $photo->photo_for_what = $request->photo_for_what;

        $photo->save();
        return redirect('/photo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Phototitle::find($id);
        return view('photo.edit',compact('photo'));
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
        $extension = $request->image; 
        $filename = uniqid().'.'.$extension->getClientOriginalExtension();
        $path = public_path(). '/uploads/';
        $extension->move($path, $filename);

        $photo = Phototitle::find($id);
        $photo->photo_name = $request->photo_name;
        $photo->image = $filename;
        $photo->photo_for_what = $request->photo_for_what;

        $photo ->save();
        return redirect('/photo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Phototitle::find($id);
        $photo->delete();
        return redirect('/photo');
    }
}
