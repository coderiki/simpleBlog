<?php

namespace App\Http\Controllers;

use App\Contracts\CommentContract;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

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
            'status' => 1
        ]);
        $this->commentContract->store($request->all());
        return back()->withSuccess(__('general.transactionSuccessful'));
    }
}
