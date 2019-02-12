<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// "CategoryController@categoryPosts"

Auth::routes();

Route::get('/', 'PostController@routeHomePostList')->name('home');

Route::get('/category/{categorySlug}', "CategoryController@categoryPosts")->name("category");

Route::get('/tag/{tagSlug}', 'PostController@routeTagPostList')->name('tagPostList');

Route::get("/post/{postSlug}", "PostController@routePostDetail")->name("postDetail");

Route::post('/commentStore', 'CommentController@store')->name('commentStore');

Route::group([
    'prefix' => '/admin',   // prefix
    'middleware' => ['web'],  // middleware. if you want write array
    'as' => 'admin',    // name
    ],
    function() {
        Route::get('/', 'AdminRouteController@routeHome')->name('.home');

        Route::get('/logout', 'AdminRouteController@routeLogout')->name('.logout');

        Route::get('/login', 'AdminRouteController@routeLogin')->name('.login');



    }
);



Route::post('/salla', 'PostController@salla')->name('salla');

Route::get("/deneme", function () {
    return view("deneme");
});






Route::post("/deneme", "PostController@createPost")->name("deneme2");