@extends('layouts.app')

@section('title')
    {{ $page->title }}
    @endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> {{ $page->title }} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <article>
                    {{ $page->content }}
                </article>
            </div>
        </div>
    </div>
    @endsection