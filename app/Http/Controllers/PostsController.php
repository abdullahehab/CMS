<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() == 0)
            return redirect()->route('category.create');

        if ($tags->count() == 0)
            return redirect()->route('tags.create');


        return view('posts.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {

        $image = $request->featured;
        $getOldName = $image->getClientOriginalName();
        $newName = time() . $getOldName;
        $image->move('uploads/posts', $newName);

        $validateData = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $newName,
            'slug' => str_slug($request->title),
            'tags' => $request -> tags
        ];

        $post = Post::create($validateData);
        $post->tags()->attach($request->tags);

        return redirect(route('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $image = $request->featured;
        $getOldName = $image->getClientOriginalName();
        $newName = time() . $getOldName;
        $image->move('uploads/posts', $newName);

        $validateData = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $newName,
            'slug' => str_slug($request->title),
            'tags' => $request -> tags
        ];

        $post->update($validateData);
//        $post->tags()->attach($request->tags); // the same action of sync function
        $post->tags()->sync($request->tags);

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.deletedPost', compact('posts'));
    }

    public function hdelete($id)
    {
        Post::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }

    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
}
