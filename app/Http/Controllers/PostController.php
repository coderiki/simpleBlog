<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\PostRepository;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

    public function store(PostRequest $request)
    {
        if ($request->has('image')) {
            $imagePath = $this->postRepository->storeImageAndReturnImagePath($request->only("image"), str_slug($request->get("title")));
        } else {
            $imagePath = Session::get('settings.0.defaultPostImage', 10);
        }

        $request->request->add(["media_path" => $imagePath]);

        try {
            $postInsert = $this->postRepository->store($request->all());
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $this->postRepository->createTag($request->only(["tag"]), $postInsert->id);

        return redirect()->route('postDetail', ['postSlug' => $postInsert->slug]);
    }

    public function update(PostRequest $request, $id)
    {
        $deleteFile =  null;
        if ($request->has('image')) {
            $imagePath = $this->postRepository->storeImageAndReturnImagePath($request->only("image"), str_slug($request->get("title")));
            $request->request->add(["media_path" => $imagePath]);
            $deleteFile = $request->get('present_image_path');
        }

        try {
            $postUpdate = $this->postRepository->update($id, $request->all(), $deleteFile);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $this->postRepository->createTag($request->only(["tag"]), $id);

        return redirect()->back();    // route('postDetail', ['postSlug' => $postUpdate->slug])
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->route('admin.listPostView');
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
}
