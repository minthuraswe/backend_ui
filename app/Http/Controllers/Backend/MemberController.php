<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Yearofservice;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mem = Member::paginate(10);

        return view('member.index', compact('mem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $yearofservice = Yearofservice::orderBy('start_year', 'desc')->get();
        return view('member.create', compact('yearofservice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->except());
        $this->validateData($request);

        $get_image = request('photo');
        $filename = uniqid() . '.' . $get_image->getClientOriginalExtension();
        $path = imagePath();
        $get_image->move($path, $filename);

        $member = Member::create([
            'mem_name' => request('name'),
            'mem_email' => request('email'),
            'mem_phone' => request('phone'),
            'mem_age' => request('age'),
            'mem_address' => request('address'),
            'mem_description' => request('description'),
            'mem_photo' => $filename,
            'mem_position' => request('position'),
            'mem_link' => request('link'),
            'mem_university' => request('university'),
            'year_id' => request('yearofservice'),
        ]);

        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mem = Member::find($id);
        return view('member.show', compact('mem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mem = Member::find($id);
        $yearofservice = Yearofservice::all();
        return view('member.edit', compact('mem', 'yearofservice'));
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
        $get_image = request('photo');

        $filename = uniqid() . '.' . $get_image->getClientOriginalExtension();
        $path = imagePath();
        $get_image->move($path, $filename);

        $mem = Member::find($id);
        $mem->mem_name = request('name');
        $mem->mem_email = request('email');
        $mem->mem_phone = request('phone');
        $mem->mem_age = request('age');
        $mem->mem_address = request('address');
        $mem->mem_description = request('description');
        $mem->mem_photo = $filename;
        $mem->mem_link = request('link');
        $mem->mem_position = request('position');
        $mem->mem_university = request('university');
        $mem->year_id = request('yearofservice');

        $mem->save();
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mem = Member::find($id)->delete();
        return redirect('member');
    }

    private function validateData($request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'position' => 'required',
            'yearofservice' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'university' => 'required',
        ]);
    }

}
