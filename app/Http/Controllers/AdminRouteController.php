<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
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

}