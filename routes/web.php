<?php
use App\Mail\TestEmail;
/*
 * GET /projects (index) -> function name
 * GET /projects/create (create)
 * GET /projects/1 (show)
 * POST /projects (store)
 * GET /project/1/edit  (edit)
 * PATCH /projects/1 (update)
 * DELETE /projects/1 (destroy)
 */

Auth::routes();

/* admin dashboard */
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware(['auth', 'admin']);

/*Post route group*/
Route::group(['prefix' => 'admin/posts', 'middleware' => ['auth', 'admin']], function () {

    //Route::resource('/', 'PostsController');
    Route::get('/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/hdelete/{id}', 'PostsController@hdelete')->name('post.hdelete');
    Route::get('/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/', 'PostsController@index')->name('posts');
    Route::get('/create', 'PostsController@create')->name('post.create');
    Route::post('/store', 'PostsController@store')->name('post.store');
    Route::get('/{post}/edit', 'PostsController@edit')->name('post.edit');
    Route::PATCH('/{post}', 'PostsController@update')->name('post.update');
    Route::get('/{post}', 'PostsController@destroy')->name('post.destroy');
});

/*Categories route group*/
Route::group(['prefix' => 'admin/category', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/trashed', 'CategoriesController@trashed')->name('category.trashed');
    Route::get('/hdelete/{id}', 'CategoriesController@hdelete')->name('category.hdelete');
    Route::get('/restore/{id}', 'CategoriesController@restore')->name('category.restore');
    Route::get('/', 'CategoriesController@index')->name('categories');
    Route::get('/create', 'CategoriesController@create')->name('category.create');
    Route::post('/store', 'CategoriesController@store')->name('category.store');
    Route::get('/{category}/edit', 'CategoriesController@edit')->name('category.edit');
    Route::PATCH('/{category}', 'CategoriesController@update')->name('category.update');
    Route::DELETE('/{category}', 'CategoriesController@destroy')->name('category.destroy');
});

/*Tag routes*/
Route::resource('/tags', 'TagController')->middleware(['auth', 'admin']);

/*User Routes*/
Route::resource('/user', 'UsersController')->middleware('auth');
Route::get('users/makeAdmin/{id}', 'UsersController@makeAdmin')->name('user.makeAdmin');
Route::get('users/deleteAdmin/{id}', 'UsersController@deleteAdmin')->name('user.deleteAdmin');

/*profile route*/
Route::get('/userProfile', 'UsersController@showProfile')->name('user.profile');
Route::resource('/profile', 'ProfilesController');
/* Setting routes */
/* Setting routes */
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::PATCH('/settings/update', 'SettingsController@update')->name('setting.update');

/* UI routes */
Route::get('/', 'SiteUiController@index');
Route::get('post/{slug}', 'SiteUiController@showPost')->name('post.show');
Route::get('/userPosts', 'SiteUiController@getPostsForUser')->name('userPost.show');
Route::get('userPosts/{post}/edit', 'SiteUiController@editUserPost')->name('UserPost.edit');
Route::PATCH('userPosts/{post}/update', 'SiteUiController@UpdateUserPost')->name('UserPost.update');
Route::GET('userPosts/{post}/delete', 'SiteUiController@destroyUserPost')->name('UserPost.destroy');

Route::get('category/{id}', 'SiteUiController@showPostsForCategory')->name('category.show');
Route::get('tag/{id}', 'SiteUiController@showPostsForTag')->name('tag.show');


/* Search route */
Route::get('/search', function () {
    $post = \App\Post::where('title', 'like',  '%' . request('search') . '%' )->get();

    return view('website.results')

        ->with('categories', \App\Category::all())
        ->with('searchKey', request('search'))
        ->with('tags', \App\Tag::all())
        ->with('posts', $post)
        ->with('settings', \App\Settings::first());

})->name('results');


/*Route for sending email*/
Route::get('/testemail', function () {

    $data = ['message' => 'This is a test!'];
    Mail::to('nrtroz.ae@gmail.com')->send(new TestEmail($data));
});

/* Role and permission routes */
Route::group(['middleware' => ['role:administrator']], function () {

    Route::resource('users', 'UsersController');
    Route::resource('permission', 'permissionController');
    Route::resource('roles', 'rolesController');
});
