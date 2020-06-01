<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Phototitle;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(6);
        return view('post.index', compact('post'));
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
        return view('post.create', compact('cat', 'photo'));
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

        Post::create([
            'post_title' => request('post'),
            'photo_id' => request('photo'),
            'cat_id' => request('category'),
            'post_description' => request('description'),
        ]);
        flash();
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $cat = Category::all();
        $photo = Phototitle::all();
        return view('post.show', compact('post', 'cat', 'photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cat = Category::all();
        $photo = Phototitle::all();
        return view('post.edit', compact('post', 'cat', 'photo'));
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
        $post = Post::find($id);
        $post->fill($request->except('_token'));

        $post->save();
        flash();
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();;
        flash();
        return redirect('/post');
    }

    private function validateData($request)
    {
        $validateData = $request->validate([
            'post' => 'required',
            'photo' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
    }
}
