<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('ads.index', compact('ads'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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

        $ads = request('ads');
        $checkpaid = request('place');
        
        $db_checkpaid = Ads::where('checkpaid', '=', $checkpaid);
        
        if($db_checkpaid->exists()){
            ads($checkpaid);
            return redirect('ads');
        }else{
            $filename = uniqid() . '.' . $ads->getClientOriginalExtension();
            $path = imagePath();
            $ads->move($path, $filename);
    
            $ads = Ads::create([
                'image' => $filename,
                'link' => request('link'),
                'checkpaid' => request('place'),
            ]);
            return redirect('ads')->with('message', 'Ads is successfully published'); 
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
        $ads = Ads::find($id);
        return view('ads.edit', compact('ads'));
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
        $ads = request('ads');

        $filename = uniqid() . '.' . $ads->getClientOriginalExtension();
        $path = imagePath();
        $ads->move($path, $filename);

        $ads = Ads::find($id);
        $ads->image = $filename;
        $ads->link = request('link');
        $ads->checkpaid = request('place');

        $ads->save();
        return redirect('ads')->with('message', 'Ads is successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id)->delete();
        return redirect('ads')->with('message', 'Ads is successfully deleted');
    }
    
    private function validateData($request)
    {
        $validateData = $request->validate([
            'ads' => 'required',
            'link' => 'required',
            'place' => 'required',
        ]);
    }
}
