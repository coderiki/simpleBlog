<?php

namespace App\Http\Controllers;

use App\Contracts\CommentContract;
use App\Http\Repositories\Eloquent\CommentRepository;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store(CommentRequest $request)
    {
        $request->request->add([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'status' => Session::get('settings.0.defaultCommentStatus', 0)
        ]);
        $this->commentRepository->store($request->all());
        return $this->backWithSuccess();
    }

    public function destroy($id)
    {
        $this->commentRepository->destroy($id);
        return $this->backWithSuccess();
    }

    public function liveIn($id)
    {
        $data = ['status' => 1];
        $this->commentRepository->update($id, $data);
        return $this->backWithSuccess();
    }

    public function liveOut($id)
    {
        $data = ['status' => 0];
        $this->commentRepository->update($id, $data);
        return $this->backWithSuccess();
    }
}
