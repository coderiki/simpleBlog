<?php

$categories = \App\Category::where("parent_id", 0)->get();
?>
<!-- Sidebar Widgets Column -->
<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">{{ __("general.search") }}</h5>
    <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="{{ __("general.searchText") }}">
            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">{{ __("general.find") }}</button>
                </span>
        </div>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">{{ __("general.categories") }}</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                    @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route("category", ["categorySlug" => $category->slug]) }}"
                                   title="{{ str_limit($category->explanation, 100, "..") }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
