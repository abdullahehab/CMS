<?php

/*
 * GET /projects (index) -> function name
 * GET /projects/create (create)
 * GET /projects/1 (show)
 * POST /projects (store)
 * GET /project/1/edit  (edit)
 * PATCH /projects/1 (update)
 * DELETE /projects/1 (destroy)
 */


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Post route group*/
Route::group(['prefix' => '/posts', 'middleware' => 'auth'], function () {

//    Route::resource('/', 'PostsController');
    Route::get('/', 'PostsController@index')->name('posts');
    Route::get('/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/hdelete/{id}', 'PostsController@hdelete')->name('post.hdelete');
    Route::get('/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/create', 'PostsController@create')->name('post.create');
    Route::post('/store', 'PostsController@store')->name('post.store');
    Route::get('/{post}/edit', 'PostsController@edit')->name('post.edit');
    Route::PATCH('/{post}', 'PostsController@update')->name('post.update');
    Route::get('/{post}', 'PostsController@destroy')->name('post.destroy');
});

/*Categories route group*/
Route::group(['prefix' => 'category', 'middleware' => 'auth'], function () {
    Route::get('/', 'CategoriesController@index')->name('categories');
    Route::get('/trashed', 'CategoriesController@trashed')->name('category.trashed');
    Route::get('/hdelete/{id}', 'CategoriesController@hdelete')->name('category.hdelete');
    Route::get('/restore/{id}', 'CategoriesController@restore')->name('category.restore');
    Route::get('/create', 'CategoriesController@create')->name('category.create');
    Route::post('/store', 'CategoriesController@store')->name('category.store');
    Route::get('/{category}/edit', 'CategoriesController@edit')->name('category.edit');
    Route::PATCH('/{category}', 'CategoriesController@update')->name('category.update');
    Route::DELETE   ('/{category}', 'CategoriesController@destroy')->name('category.destroy');
//    delete route
});


Route::resource('/tags', 'TagController')->middleware('auth');
//Route::get('/tags/{tag}', 'TagController@destroy')->name('tag.destroy');

Route::get('/getall', function() {


    $cat = App\Category::find(5);
    dd($cat);
    return $cat;


});