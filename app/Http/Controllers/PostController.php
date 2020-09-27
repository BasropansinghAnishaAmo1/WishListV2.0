<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()->paginate(5);

        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'price' => 'required',
            'url' => ['required', 'url'],
        ]);

        Posts::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Posts created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);
        return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $posts = Posts::find($id);
//        return view('posts.edit',compact('posts'));
        $posts = Posts::find($id);

        return view('posts.edit')->with('posts', $posts)->with('posts', $posts);
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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'price' => 'required',
            'url' => ['required', 'url'],
        ]);


        Posts::where('id', $id)->update([
            'title' => request('title'),
            'body'=> request('body'),
            'image' => request('image'),
            'price' => request('price'),
            'url' => request('url')
        ]);

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Posts::select('id')->where('id', $id);
        $id->delete($id);
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}
