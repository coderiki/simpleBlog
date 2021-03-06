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

Route::get('/page/{slug}', 'PageController@show')->name('pageDetail');

Route::group([
    'prefix' => '/admin',   // prefix
    'middleware' => ['web'],  // middleware. if you want write array
    'as' => 'admin',    // name
    ],
    function() {
        //Route::get('/', 'AdminRouteController@routeHome')->name('.home');
        Route::get('/', 'AdminRouteController@routeAddPost')->name('.home');

        Route::get('/login', 'AdminRouteController@routeLogin')->name('.login');
        Route::get('/logout', 'AdminRouteController@routeLogout')->name('.logout');

        Route::get('/addCategory', 'AdminRouteController@routeAddCategory')->name('.addCategoryView');
        Route::post('/addCategory', 'CategoryController@createCategory')->name('.addCategoryPost');
        Route::get('/listCategory', 'AdminRouteController@routeListCategory')->name('.listCategoryView');
        Route::get('/deleteCategory/{id}', 'CategoryController@destroy')->name('.deleteCategory');
        Route::get('/editCategory/{id}', 'AdminRouteController@routeEditCategory')->name('.editCategoryView');
        Route::post('/editCategory/{id}', 'CategoryController@update')->name('.editCategoryPost');

        Route::get('/addPost', 'AdminRouteController@routeAddPost')->name('.addPostView');
        Route::post('/addPost', 'PostController@store')->name('.addPostPost');
        Route::get('/listPost', 'AdminRouteController@routeListPost')->name('.listPostView');
        Route::get('/deletePost/{id}', 'PostController@destroy')->name('.deletePost');
        Route::get('/editPost/{id}', 'AdminRouteController@routeEditPost')->name('.editPostView');
        Route::post('/editPost/{id}', 'PostController@update')->name('.editPostPost');

        Route::get('/editSetting', 'SettingController@edit')->name('.editSettingView');
        Route::post('/editSetting', 'SettingController@update')->name('.editSettingPost');

        Route::get('/listComment', 'AdminRouteController@routeListComment')->name('.listCommentView');
        Route::get('/commentLiveIn/{id}', 'CommentController@liveIn')->name('.editCommentStatusIn');
        Route::get('/commentLiveOut/{id}', 'CommentController@liveOut')->name('.editCommentStatusOut');
        Route::get('/commentDestroy/{id}', 'CommentController@destroy')->name('.deleteComment');

        Route::get('/addPage', 'PageController@viewAdd')->name('.addPageView');
        Route::post('/addPage', 'PageController@store')->name('.addPagePost');
        Route::get('/listPage', 'PageController@list')->name('.listPageView');
        Route::get('/deletePage/{id}', 'PageController@destroy')->name('.deletePage');
        Route::get('/editPage/{id}', 'PageController@edit')->name('.editPageView');
        Route::post('/editPage/{id}', 'PageController@update')->name('.editPagePost');

    }
);
