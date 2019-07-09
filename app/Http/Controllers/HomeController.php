<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin.dashboard')
            ->with('posts_count', Post::all()->count())
            ->with('tags_count', Tag::all()->count())
            ->with('users_count', User::all()->count())
            ->with('categories_count', Category::all()->count())
            ->with('trashed_posts_count', Post::onlyTrashed()->get()->count())
            ->with('trashed_categories_count', Category::onlyTrashed()->get()->count());
    }
}
