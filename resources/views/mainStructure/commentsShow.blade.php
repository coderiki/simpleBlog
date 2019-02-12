<!-- Comment -->
@if($post->comments)
@foreach($post->comments()->paginate(2) as $comment)
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="{{ asset('image/web/unknown-profile-photo.jpg') }}" alt="">
        <div class="media-body">
            <h4 class="mt-0">{{ $comment->name }} </h4>
            <h6><small>{{ __('general.releaseDate') }}</small> {{ $comment->created_at }}</h6>
            {{ $comment->comment }}
        </div>
    </div>
@endforeach

{{ $post->comments()->paginate(2)->links() }}
@endif