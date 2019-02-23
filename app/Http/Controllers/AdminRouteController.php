<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRouteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('routeLogin');
    }

    public function routeHome()
    {
        return view('admin.home');
    }

    public function routeLogin()
    {
        return view('admin.login');
    }

    public function routeLogout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('admin.login');
        } else {
            return back();
        }
    }

    public function routeAddCategory()
    {
        return view('admin.addCategory');
    }

    public function routeAddPost()
    {
        return view('admin.addPost');
    }

    public function routeListCategory()
    {
        $categories = Category::all();
        return view('admin.listCategory', compact('categories'));
    }

    public function routeEditCategory($id)
    {
        $category = Category::findOrFail($id);
        $categoryList = Category::where('id', '!=', $id)->get();
        return view('admin.editCategory', compact('category', 'categoryList'));
    }

    public function routeListPost()
    {
        $posts = Post::all();
        return view('admin.listPost', compact('posts'));
    }

    public function routeEditPost($id)
    {
        $post = Post::findOrFail($id);
        $tagList = $post->tagList;
        return view('admin.editPost', compact('post', 'tagList'));
    }

    public function routeListComment()
    {
        $comments = Comment::with('post')
            ->get();
        return view('admin.listComment', compact('comments'));
    }

    public function routeAddPage()
    {
        return view('admin.addPage');
    }
}
