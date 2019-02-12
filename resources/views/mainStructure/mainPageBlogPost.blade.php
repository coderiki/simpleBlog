<!-- Blog Post -->
<?php
?>
<!--
Media ya link verecek miyiz bunu kararlaştıracağız.
Daha fazla oku butonuna basıldığında post detail sayfasına bağlantı vereceğiz.
Post u oluşturan kişinin profil sayfası bolümünü yapınca yazar kısmında ilgili url eklenecek.
Oluşturulma tarihi kısmı seçili dile gore değişiyor mu kontrol edeceğiz.
-->

@if(isset($categoryInfo))
    <!-- Blog Entries Column -->
    <h1 class="my-4">{{ $categoryInfo->title }}</h1>
    @section("title"){{ $categoryInfo->explanation }}@endsection
    @else
    <h1 class="my-4"> {{ __("general.currentPosts") }} </h1>
    @endif

@if(isset($blogPosts))
    @foreach($blogPosts as $post)
        <div class="card mb-4">
            <img class="card-img-top" src="{{ asset($post->media_path) }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ str_limit($post->content, 215, "...") }}</p>
                <a href="{{ route("postDetail", ["postSlug" => $post->slug]) }}" class="btn btn-primary">{{ __("general.readMore")  }} &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                {{ __("general.releaseDate") }}
                {{ $post->publication_time->toDateTimeString() }}
                 &nbsp;| |&nbsp;
                {{ __("general.author") }}
                <a href="#"> {{ $post->user->name }}</a>
            </div>
        </div>
        @endforeach

    <!-- Pagination -->
    {{ $blogPosts->links() }}
    @endif


