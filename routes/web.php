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

        Route::get('/login', 'AdminRouteController@routeLogin')->name('.login');
        Route::get('/logout', 'AdminRouteController@routeLogout')->name('.logout');

        Route::get('/addCategory', 'AdminRouteController@routeAddCategory')->name('.addCategoryView');
        Route::post('/addCategory', 'CategoryController@createCategory')->name('.addCategoryPost');
        Route::get('/listCategory', 'AdminRouteController@routeListCategory')->name('.listCategoryView');
        Route::get('/deleteCategory/{id}', 'CategoryController@destroy')->name('.deleteCategory');
        Route::get('/editCategory/{id}', 'AdminRouteController@routeEditCategory')->name('.editCategoryView');
        Route::post('/editCategory/{id}', 'CategoryController@update')->name('.editCategoryPost');

        Route::get('/addPost', 'AdminRouteController@routeAddPost')->name('.addPostView');
        Route::post('/addPost', 'PostController@createPost')->name('.addPostPost');
        Route::get('/listPost', 'AdminRouteController@routeListPost')->name('.listPostView');
        Route::get('/deletePost/{id}', 'PostController@destroy')->name('.deletePost');


    }
);

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

Route::get('/deneme', function ()
{
    $image_path = public_path('image\upload\2019\02\12\deneme-amacli-bir-baslik-1549962023.jpg');
    if(File::exists($image_path)) {
        File::delete($image_path);
        echo 'Dosya silindi';
    } else {
        echo 'dosya yok';
    }
});
