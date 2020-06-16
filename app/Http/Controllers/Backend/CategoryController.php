<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::paginate(9);
        return view('category.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category' => 'required',
        ]);

        $check = request('category'); 
        //checking if value is integer or not
        if(is_numeric($check)){
            checkNumeric();
            return back();
        }
        //checking if vlaues exists or not
        $database = Category::where('cat_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return redirect('category');
        }else{
            Category::create([
            'cat_name' => request('category'),
            ]);
            return redirect('category');
        }
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
        $cat = Category::find($id);
        return view('category.edit', compact('cat'));
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
        $cat = Category::find($id);
        $check = request('name'); 
        //checking if value is integer or not
        if(is_numeric($check)){
            checkNumeric();
            return back();
        }
        //checking if vlaues exists or not
        $database = Category::where('cat_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return back();
        }else{
            $cat->cat_name = $request->name;
            $cat->save();
            return redirect('category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id)->delete();
        return redirect('category');
    }
}
