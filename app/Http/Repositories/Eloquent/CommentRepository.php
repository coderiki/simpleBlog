<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 07.02.2019
 * Time: 09:22
 */

namespace App\Http\Repositories\Eloquent;


use App\Comment;
use App\Contracts\CommentContract;

class CommentRepository implements CommentContract
{
    /**
     * @var Comment
     */
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($datas)
    {
        // TODO: Implement store() method.
        return $this->comment->create($datas);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $comment = Comment::findOrFail($id);
        return $comment->delete();
    }

    public function update($id, $datas)
    {
        // TODO: Implement update() method.
        $comment = Comment::findOrFail($id);
        return $comment->update($datas);
    }
}