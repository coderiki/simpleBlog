@extends('admin.layouts.app')

@section('title')
    {{ __('general.addCategory') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('general.addCategory') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.addCategoryPost') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('general.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       name="title" value="{{ old('title') }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="explanation"
                                   class="col-md-4 col-form-label text-md-right">{{ __('general.explanation') }}</label>
                            <div class="col-md-6">
                                <input id="explanation" type="text"
                                       class="form-control{{ $errors->has('explanation') ? ' is-invalid' : '' }}"
                                       name="explanation" value="{{ old('explanation') }}" required>
                                @if ($errors->has('explanation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('explanation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="queue"
                                   class="col-md-4 col-form-label text-md-right">{{ __('general.queue') }}</label>
                            <div class="col-md-6">
                                <input id="queue" type="number"
                                       class="form-control{{ $errors->has('queue') ? ' is-invalid' : '' }}"
                                       name="queue" value="{{ old('queue') }}" required>
                                @if ($errors->has('queue'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('queue') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id"
                                   class="col-md-4 col-form-label text-md-right">{{ __('general.parentCategory') }}</label>
                            <div class="col-md-6">
                                {!! Form::select(
                                        'parent_id',
                                        array_merge(['0' => __('general.mainCategory')], \App\Category::pluck('title', "id")->toArray()),
                                        null,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    )
                                !!}
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('general.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection