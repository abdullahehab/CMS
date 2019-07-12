<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Settings;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteUiController extends Controller
{


    /**
     * SiteUiController constructor.
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $posts = Post::orderByRaw("RAND()")->get();

        return view('website.home')

            ->with('posts', Post::all())
            ->with('settings', Settings::first())
            ->with('categories', Category::all()) /*Category::all()->take(5) to limit returned data */
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('tags', Tag::all())
            ->with('instaPosts', $posts);
    }

    public function showPost($slug)
    {
        $post       = Post::where('slug', $slug)->first();
        $next_page = Post::where('id' , '>' ,$post->id)->min('id');
        $prev_page = Post::where('id' , '<' ,$post->id)->max('id');

        return view('posts.show')
            ->with('post', $post)
            ->with('next_post', Post::find($next_page))
            ->with('prev_post', Post::find($prev_page))
            ->with('tags', Tag::all())
            ->with('categories', Category::all())
            ->with('settings', Settings::first());
    }

    public function showPostsForCategory($id)
    {
        $category = Category::find($id);
        $posts = Post::where('category_id', $id)->take(4)->get();

        return view('website.showPostsForCat')
            ->with('settings', Settings::first())
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $posts)
            ->with('category', $category);
    }

    public function showPostsForTag($id)
    {
        $tag = Tag::find($id);

        return view('website.showPostsForTag')
            ->with('settings', Settings::first())
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('tag', $tag);
    }

    public function getPostsForUser()
    {
        $posts = Post::where('user_id', Auth::id())->get();

        return view('website.showPostsForUser')
            ->with('posts', $posts)
            ->with('categories', Category::all())
            ->with('settings', Settings::first())
            ->with('tags', Tag::all());
    }

    public function editUserPost($id)
    {
        $post = Post::find($id);
        return view('website.editUserPost', compact('post'))
            ->with('settings', Settings::first())
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('tags', Tag::all());
    }

    public function UpdateUserPost(Request $request, $id)  // leh msh 3awz ysh8al el PostRequest
    {
        $post = Post::find($id);

        if( $request->hasFile('featured'))
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

        }
        else
        {
            $validateData = [
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'featured' => $post->featured,
                'slug' => str_slug($request->title),
                'tags' => $request -> tags
            ];
        }

        $post->update($validateData);
//        $post->tags()->attach($request->tags); // the same action of sync function
        $post->tags()->sync($request->tags);

        return back();
    }

    public function destroyUserPost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return back();
    }
}