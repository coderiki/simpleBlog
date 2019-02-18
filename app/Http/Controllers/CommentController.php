<?php

namespace App\Http\Controllers;

use App\Contracts\CommentContract;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * @var CommentContract
     */
    private $commentContract;

    public function __construct(CommentContract $commentContract)
    {
        $this->commentContract = $commentContract;
    }

    public function store(CommentRequest $request)
    {
        $request->request->add([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'status' => Session::get('settings.0.defaultCommentStatus', 0)
        ]);
        $this->commentContract->store($request->all());
        return back()->withSuccess(__('general.transactionSuccessful'));
    }
}
