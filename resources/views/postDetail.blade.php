@extends('layouts.app')
@section("content")

    <!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        {{ __("general.author") }}
        <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>{{ __("general.releaseDate") }} {{ $post->publication_time->toDateTimeString() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded post-detail-image" src="{{ asset($post->media_path) }}" alt="">

    <hr>

    <!-- Post Content -->
    <article>
        {{ $post->content }}
    </article>
    <hr>

    @include('mainStructure.tagsShow')
    <hr>

    @include("mainStructure.commentsShow")

    @include('components.alertSuccess')

    @include("components.alertDanger")

    @include("mainStructure.commentsForm")

    @endsection