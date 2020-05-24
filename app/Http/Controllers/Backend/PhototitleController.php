<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Phototitle;
use Illuminate\Http\Request;

class PhototitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Phototitle::paginate(5);
        return view('photo.index', compact('photo'));
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
        $this->validateData($request);

        $extension = $request->photo;
        $filename = uniqid() . '.' . $extension->getClientOriginalExtension();
        $path = public_path() . '/uploads/';
        $extension->move($path, $filename);

        Phototitle::create([
            'photo_name' => request('name'),
            'image' => $filename,
            'photo_for_what' => request('category'),
        ]);

        return redirect('photo')->with('message', '1 row affected');
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
        return view('photo.edit', compact('photo'));
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
        $extension = $request->photo;
        $filename = uniqid() . '.' . $extension->getClientOriginalExtension();
        $path = public_path() . '/uploads/';
        $extension->move($path, $filename);

        $photo = Phototitle::find($id);
        $photo->photo_name = $request->name;
        $photo->image = $filename;
        $photo->photo_for_what = $request->category;

        $photo->save();
        return redirect('photo')->with('message', '1 row affected');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Phototitle::find($id)->delete();
        return redirect('photo')->with('message', '1 row affected');
    }

    private function validateData($request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:jpeg, jpg, png',
            'category' => 'required',
        ]);
    }
}
