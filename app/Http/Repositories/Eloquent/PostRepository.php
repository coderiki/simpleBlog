<?php
/**
 * Created by PhpStorm.
 * User: CoDe
 * Date: 06.02.2019
 * Time: 18:29
 */

namespace App\Http\Repositories\Eloquent;


use App\Contracts\PostContract;
use App\Http\Repositories\Fluent\ImageRepository;
use App\Post;
use Cviebrock\EloquentTaggable\Models\Tag;

class PostRepository implements PostContract
{

    /**
     * @var Post
     */
    private $post;
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    public function __construct(Post $post, ImageRepository $imageRepository)
    {
        $this->post = $post;
        $this->imageRepository = $imageRepository;
    }

    public function store($params)
    {
        // TODO: Implement store() method.
        return $this->post->create($params);
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $post = $this->post->findOrFail($id);
        $this->imageRepository->destroy($post->media_path);
        return $post->delete();
    }

    public function update($id, $datas, $deleteFile = null)
    {
        // TODO: Implement update() method.
        if ($deleteFile) {
            $this->imageRepository->destroy($deleteFile);
        }
        $post = $this->post->findOrFail($id);
        $post->slug = null;
        return $post->update($datas);
    }

    public function storeImageAndReturnImagePath($requestImage, $slug)
    {
        return $this->imageRepository->store($requestImage, $slug);
    }

    public function showDetailWithSlug($slug)
    {
        // TODO: Implement post() method.
        return $this->post->where("slug", $slug)
            ->with("user")
            ->with("category")
            ->with('comments')
            ->with('tags')
            ->firstOrFail();
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

    public function listTagPosts($tagSlug)
    {
        $blogPostsIds = $this->getTagPostIds($tagSlug);
        return $this->post->with("user")
            ->whereIn('id', $blogPostsIds)
            ->where("status", ">", 0)
            ->where("publication_time", "<=", date("Y-m-d H:i:s"))
            ->orderBy("publication_time", "desc")
            ->paginate(config("app.paginateCount.tagPostsPaginate"));
    }

    protected function getTagPostIds($tagSlug)
    {
        $tag = Tag::findByName($tagSlug);
        if ($tag) {
            return $tag->posts->pluck('id');
        }
        return abort(404);
    }

    public function createTag($tags, $postid)
    {
        // TODO: Implement post() method.
        return $this->post->findOrFail($postid)->tag($tags["tag"]);
    }
}