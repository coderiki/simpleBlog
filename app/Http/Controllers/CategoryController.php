<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use App\Http\Requests\CategoryRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    /**
     * @var CategoryContract
     */
    private $categoryContract;
    private $postContract;

    public function __construct(CategoryContract $categoryContract, PostContract $postContract)
    {
        $this->categoryContract = $categoryContract;
        $this->postContract = $postContract;
    }

    public function createCategory(CategoryRequest $request)
    {
        $categorySave = $this->categoryContract->store($request->all());

        return redirect()->route('category', ['categorySlug' => $categorySave->slug]);
    }

    public function categoryPosts($categorySlug)
    {
        $categoryInfo = $this->categoryContract->getCategoryInfoWithSlug($categorySlug);

        $blogPosts = $this->postContract->listCategoryPosts($categoryInfo->id);

        return view('categoryPosts', compact("blogPosts", "categoryInfo"));
    }

    public function destroy($id)
    {
        $this->categoryContract->destroy($id);
        return back();
    }

}

/*
Basit bir kategori ekleme alanı - blade ile
    {!! Form::open(['route' => "deneme2", 'method' => 'post']) !!}
        {!! Form::text('title', 'title', ['tagName'=> 'tagValue']) !!}
        {!! Form::text('comment', 'comment', ['tagName'=> 'tagValue']) !!}
        {!! Form::number('queue', 'queue', ['class'=> 'deneme']) !!}
        {!! Form::number('parent_id', 'parent_id', ['class'=> 'deneme']) !!}
    {!! Form::submit('Gönder', ['class' => 'form-control btn-primary rounded-bottom']) !!}
    {!! Form::close() !!}


    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
 */
