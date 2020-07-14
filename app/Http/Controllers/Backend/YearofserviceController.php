<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Yearofservice;

class YearofserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yearofservice = Yearofservice::paginate(10);
        return view('yearofservice.index', compact('yearofservice'));
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
        $this->validateData($request);
        
        $yearofservice = Yearofservice::create([
            'start_year' => request('startyear'),
            'end_year' => request('endyear'),
        ]);
        return redirect('yearofservice');
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
        $yearofservice = Yearofservice::find($id);
        return view('yearofservice.edit', compact('yearofservice'));
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
        $yearofservice = Yearofservice::find($id);

        $yearofservice->start_year = $request->startyear;
        $yearofservice->end_year = $request->endyear;
        $yearofservice->save();
        return redirect('yearofservice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yearofservice = Yearofservice::find($id)->delete();
        return redirect('yearofservice');
    }

    private function validateData($request)
    {
        $validateData = $request->validate([
            'startyear' => 'required',
            'endyear' => 'required',
        ]);
    }
}
