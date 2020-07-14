<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(10);
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
        return view('post.create', compact('cat'));
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

        $get_image = request('photo');

        $filename = uniqid() . '.' . $get_image->getClientOriginalExtension();
        $path = imagePath();
        $get_image->move($path, $filename);


        Post::create([
            'post_title' => request('post'),
            'post_image' => $filename,
            'cat_id' => request('category'),
            'user_id' => auth()->id(),
            'post_description' => request('description'),
        ]);
    
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
        return view('post.show', compact('post', 'cat'));
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
        return view('post.edit', compact('post', 'cat'));
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

        $post = Post::find($id);
        $post->post_title = request('post');
        $post->cat_id = request('category');
        $post->post_image = $filename;
        $post->post_description = request('description');

        $post->save();
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
        $post = Post::find($id)->delete();
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
