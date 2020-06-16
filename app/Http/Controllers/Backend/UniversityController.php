<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uni = University::paginate(9);
        return view('university.index',compact('uni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
        ]);
        $check = request('name'); 
        //checking if value is integer or not
        if(is_numeric($check)){
            checkNumeric();
            return back();
        }
        //checking if vlaues exists or not
        $database = University::where('uni_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return redirect('university');
        }else{
            University::create([
                'uni_name' => request('name'),
            ]);
        return redirect('university');
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
        $uni = University::find($id);
        return view('university.edit',compact('uni'));
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
        $uni = University::find($id);
        $check = request('name'); 
        //checking if value is integer or not
        if(is_numeric($check)){
            checkNumeric();
            return back();
        }
        //checking if vlaues exists or not
        $database = University::where('uni_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return back();
        }else{
            $uni->uni_name = $request->name;
            $uni->save();
            return redirect('university');
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
        $uni = University::find($id)->delete();
        return redirect('university');
    }
}
