<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Responsible;
use App\Member;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Responsible::paginate(9);
        return view('responsible.index',compact('res'));
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
        $database = Responsible::where('res_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return back();
    
        }else{
            Responsible::create([
                'res_name' => request('name'),
            ]);
            return redirect('responsible');
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
    public function edit(Responsible $responsible)
    {
        return view('responsible.edit',compact('responsible'));
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
        $res = Responsible::find($id);
        $check = request('name'); 
        //checking if value is integer or not
        if(is_numeric($check)){
            checkNumeric();
            return back();
        }
        //checking if vlaues exists or not
        $database = Responsible::where('res_name', '=', $check);
        if($database->exists()){
            checkExists($check);
            return back();
        }else{
            $res->res_name = $request->name;
            $res->save();
            return redirect('responsible');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsible $responsible)
    {
        Responsible::find($responsible->id)->delete();
        return redirect('responsible');
    }
}
