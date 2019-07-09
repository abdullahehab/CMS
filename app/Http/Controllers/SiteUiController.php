<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Settings;
use App\Tag;
use Illuminate\Http\Request;

class SiteUiController extends Controller
{
    public function index()
    {
        return view('index')

            ->with('posts', Post::all())
            ->with('settings', Settings::first())
            ->with('categories', Category::all()) /*Category::all()->take(5) to limit returned data */
            ->with('first_post', Post::orderBy('created_at', 'desc')->first())
            ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('tags', Tag::all())
            ->with('posts', Post::all()->random(6)->take(6));
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
}