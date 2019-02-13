<?php

namespace App\Http\Controllers;

use App\Contracts\PostContract;
use App\Http\Repositories\Fluent\ImageRepository;
use App\Http\Requests\PostRequest;
use App\Post;
use Carbon\Carbon;
use Cviebrock\EloquentTaggable\Models\Tag;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * @var PostContract
     */
    private $postContract;
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    public function __construct(PostContract $postContract, ImageRepository $imageRepository)
    {
        $this->postContract = $postContract;
        /*
         * PostController yüklenirken tanımladığımız PostContract yani interface yüklensin diyoruz.
         */
        $this->imageRepository = $imageRepository;
    }

    public function createPost(PostRequest $request)
    {
        $imagePath = $this->imageRepository->store($request->only("image"), str_slug($request->get("title")));

        $request->request->add(["media_path" => $imagePath]);

        try {
            $postInsert = $this->postContract->store($request->all());
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $this->postContract->createTag($request->only(["tag"]), $postInsert->id);

        return redirect()->route('postDetail', ['postSlug' => $postInsert->slug]);
    }

    public function routePostDetail($postSlug)
    {
        $post = $this->postContract->showDetailWithSlug($postSlug);

        return view("postDetail", compact("post"));
    }

    public function routeHomePostList()
    {
        $blogPosts = $this->postContract->listHomePosts();

        return view('home', compact("blogPosts"));
    }

    public function routeTagPostList($tagSlug)
    {
        $tagPostIds = Tag::findByName($tagSlug)->posts->pluck('id');

        $blogPosts = $this->postContract->listTagPosts($tagPostIds);

        return view('tagPosts', compact("blogPosts"));
    }

    public function destroy($id)
    {
        $postDelete = $this->postContract->destroy($id);
        // İmage silen method çağrılacak ve image silinecek.
        return redirect()->route('admin.listPostView');
    }
}

/*
{!! Form::open(['route' => "deneme2", 'method' => 'post', "files" => true]) !!}
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', 'title', ['tagName'=> 'tagValue']) !!}
    <br>
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::text('content', 'content', ['tagName'=> 'tagValue']) !!}
    <br>
    {!! Form::label('tag', 'Tag', ['class' => 'control-label']) !!}
    {!! Form::text('tag', 'Tag', ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
    {!! Form::select('category_id', \App\Category::pluck('title', "id"), null, ['placeholder' => 'Kategori Seç']) !!}
    <br>
    {!! Form::label('User ID', 'User ID', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', \App\User::pluck("name", "id"), null, ['placeholder' => 'Kullanıcı Seç']) !!}
    <br>
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', [1 => "Aktif", 0 => "Pasif"], null, ['placeholder' => 'Durum Seç']) !!}
    <br>
    {!! Form::label('publication time', 'Publication time', ['class' => 'control-label']) !!}
    <input type="datetime-local" name="publication_time" value="{{ \Carbon\Carbon::now()->format("Y-m-d\TH:i:s") }}">
    <br>
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file("image", $attributes = []) !!}
    <br>
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