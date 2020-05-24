<?php

namespace App\Http\Controllers\Backend;

use App\Activity;
use App\Category;
use App\Http\Controllers\Controller;
use App\Phototitle;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act = Activity::paginate(5);
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
        
        $this->validateData($request);

        $mem = $request->memory;
        $ary = array();
        
        foreach ($mem as $data) {
            $filename = uniqid() . '.' . $data->getClientOriginalExtension();
            array_push($ary, $filename);
            $path = public_path() . '/uploads/';
            $data->move($path, $filename);
        }

        Activity::create([
            'act_name' => request('name'),
            'cat_id' => request('category'),
            'photo_id' => request('photo'),
            'act_memory' => serialize($ary),
        ]);

        return redirect('activity')->with('message', '1 row affected');
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
        // dd($act);
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
        $mem = $request->act_memory;
        $ary = array();

        foreach ($mem as $data) {
            $filename = uniqid() . '.' . $data->getClientOriginalExtension();
            array_push($ary, $filename);
            $path = public_path() . '/uploads/';
            $data->move($path, $filename);
        }
       

        $act = Activity::find($id);

        $act->act_name = $request->act_name;
        $act->cat_id = $request->cat_id;
        $act->photo_id = $request->photo_id;
        $act->act_memory = serialize($ary);

        $act->save();
        return redirect('activity')->with('message', '1 row affected');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::find($id)->delete();
        return redirect('activity')->with('message', '1 row affected');
    }

    private function validateData($request){
        $validateData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'photo' => 'required',
            'memory' => 'required',
            'memory.*' => 'required|mimes:jpeg, jpg, png',
        ]);
    }
}
