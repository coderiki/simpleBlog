@extends('layouts.app')

@section("content")
    {!! Form::open(['route' => "deneme2", 'method' => 'post', "files" => true]) !!}  
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', 'title', ['tagName'=> 'tagValue', 'class' => 'form-control']) !!}
    <br>
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::text('content', 'content', ['tagName'=> 'tagValue', 'class' => 'form-control']) !!}
    <br>
    {!! Form::label('tag', 'Tag', ['class' => 'control-label']) !!}
    {!! Form::text('tag', 'Tag', ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
    {!! Form::select('category_id', \App\Category::pluck('title', "id"), null, ['placeholder' => 'Kategori Seç', 'class' => 'form-control']) !!}
    <br>
    {!! Form::label('User ID', 'User ID', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', \App\User::pluck("name", "id"), null, ['placeholder' => 'Kullanıcı Seç', 'class' => 'form-control']) !!}
    <br>
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', [1 => "Aktif", 0 => "Pasif"], null, ['placeholder' => 'Durum Seç', 'class' => 'form-control']) !!}
    <br>
    {!! Form::label('publication time', 'Publication time', ['class' => 'control-label']) !!}
    <input class="form-control" type="datetime-local" name="publication_time" value="{{ \Carbon\Carbon::now()->format("Y-m-d\TH:i:s") }}">
    <br>
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file("image", $attributes = ['class' => 'form-control']) !!}
    <br>
    {!! Form::submit('Gönder', ['class' => 'form-control btn-primary rounded-bottom']) !!}
    {!! Form::close() !!}


    @endsection