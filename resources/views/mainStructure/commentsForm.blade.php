<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">{{ __("general.LeaveAComment") }}</h5>

    <div class="card-body">
        <form action="{{ route('commentStore') }}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="{{ __("general.nameSurname") }}" @if(count($errors) > 0 or \Session::has('success')) autofocus @endif>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="{{ __("general.email") }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" style="resize: none;" placeholder="{{ __("general.comment") }}"></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @csrf
            <button type="submit" class="btn btn-primary">{{ __("general.submit") }}</button>
        </form>
    </div>
</div>