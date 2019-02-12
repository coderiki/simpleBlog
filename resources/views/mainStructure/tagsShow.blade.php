@foreach($post->tags as $tag)
    <a href="{{ route('tagPostList', ['tagSlug' => $tag->normalized]) }}">
        <span class="badge badge-info">
            {{ $tag->name }}
        </span>
    </a>
    @endforeach