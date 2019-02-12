<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 06.02.2019
 * Time: 18:29
 */

namespace App\Http\Repositories\Eloquent;


use App\Contracts\PostContract;
use App\Post;

class PostRepository implements PostContract
{

    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function store($params)
    {
        return $this->post->create($params);
        // TODO: Implement store() method.
    }

    public function destroy($id)
    {
        return $this->post->findOrdFail($id)->delete();
        // TODO: Implement destroy() method.
    }

    public function update($datas)
    {
        return $this->post->findOrFail($datas['id'])->update($datas);
        // TODO: Implement update() method.
    }

    public function showDetailWithSlug($slug)
    {
        return $this->post->where("slug", $slug)
            ->with("user")
            ->with("category")
            ->with('comments')
            ->with('tags')
            ->firstOrFail();
        // TODO: Implement post() method.
    }

    public function listCategoryPosts($categoryId)
    {
        return $this->post->with("user")
            ->where("category_id", $categoryId)
            ->where("status", ">", 0)
            ->where("publication_time", "<=", date("Y-m-d H:i:s"))
            ->orderBy("publication_time", "desc")
            ->paginate(config("app.paginateCount.postInCategoryPaginate"));
    }

    public function listHomePosts()
    {
        return $this->post->with("user")
            ->where("status", ">", 0)
            ->where("publication_time", "<=", date("Y-m-d H:i:s"))
            ->orderBy("publication_time", "desc")
            ->paginate(config("app.paginateCount.postInHomePaginate"));
    }

    public function listTagPosts($blogPostsIds)
    {
        return $this->post->with("user")
            ->whereIn('id', $blogPostsIds)
            ->where("status", ">", 0)
            ->where("publication_time", "<=", date("Y-m-d H:i:s"))
            ->orderBy("publication_time", "desc")
            ->paginate(config("app.paginateCount.tagPostsPaginate"));
    }

    public function createTag($tags, $postid)
    {
        return $this->post->findOrFail($postid)->tag($tags["tag"]);
        // TODO: Implement post() method.
    }
}