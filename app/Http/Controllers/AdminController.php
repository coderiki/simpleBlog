<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var PostContract
     */
    private $postContract;
    /**
     * @var CategoryContract
     */
    private $categoryContract;

    public function __construct(PostContract $postContract, CategoryContract $categoryContract)
    {
        $this->postContract = $postContract;
        $this->categoryContract = $categoryContract;

        $this->middleware('auth');
    }

}
