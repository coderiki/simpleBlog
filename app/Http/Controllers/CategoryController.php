<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use App\Http\Repositories\Eloquent\CategoryRepository;
use App\Http\Repositories\Eloquent\PostRepository;
use App\Http\Requests\CategoryRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function createCategory(CategoryRequest $request)
    {
        $categorySave = $this->categoryRepository->store($request->all());

        return redirect()->route('category', ['categorySlug' => $categorySave->slug]);
    }

    public function categoryPosts($categorySlug)
    {
        $categoryInfo = $this->categoryRepository->getCategoryInfoWithSlug($categorySlug);

        $blogPosts = $this->postRepository->listCategoryPosts($categoryInfo->id);

        return view('categoryPosts', compact("blogPosts", "categoryInfo"));
    }

    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        return back();
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->update($request->toArray(), $id);
        return redirect()->route('admin.listCategoryView');
    }
}
