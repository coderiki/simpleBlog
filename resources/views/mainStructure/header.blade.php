<?php
$pages = \App\Page::all();
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">
            {{ Session::get('settings.0.homeTitle') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">
                        {{ __('general.home') }}
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">Admin Panel</a>
                    </li>
                @endif

                @foreach($pages as $page)
                    <li class="nav-item">
                        <a href="{{ route('pageDetail', ['slug' => $page->slug]) }}" class="nav-link">{{ $page->title }}</a>
                    </li>
                    @endforeach
            </ul>
        </div>
    </div>
</nav>