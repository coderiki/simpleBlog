@if(count($errors) > 0)
<div class="alert alert-danger" role="alert" id="alert-danger">
    <h4 class="alert-heading">{{ __("general.errorOccurred") }}</h4>
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>

@endif
