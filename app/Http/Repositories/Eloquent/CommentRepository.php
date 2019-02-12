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
        return $this->comment->create($datas);
        // TODO: Implement store() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function update($datas)
    {
        // TODO: Implement update() method.
    }
}