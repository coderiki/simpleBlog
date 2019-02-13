<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\PostRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost(PostRequest $request)
    {
        $imagePath = $this->postRepository->storeImageAndReturnImagePath($request->only("image"), str_slug($request->get("title")));

        $request->request->add(["media_path" => $imagePath]);

        try {
            $postInsert = $this->postRepository->store($request->all());
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $this->postRepository->createTag($request->only(["tag"]), $postInsert->id);

        return redirect()->route('postDetail', ['postSlug' => $postInsert->slug]);
    }

    public function routePostDetail($postSlug)
    {
        $post = $this->postRepository->showDetailWithSlug($postSlug);

        return view("postDetail", compact("post"));
    }

    public function routeHomePostList()
    {
        $blogPosts = $this->postRepository->listHomePosts();

        return view('home', compact("blogPosts"));
    }

    public function routeTagPostList($tagSlug)
    {
        $blogPosts = $this->postRepository->listTagPosts($tagSlug);

        return view('tagPosts', compact("blogPosts"));
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->route('admin.listPostView');
    }
}
