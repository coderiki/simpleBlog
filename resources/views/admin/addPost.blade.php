@extends('admin.layouts.app')

@section('title')
    {{ __('general.addPost') }}
    @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('general.addPost') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.addPostPost') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                <label for="content"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.content') }}</label>
                                <div class="col-md-6">
                                    <textarea style="resize: none"
                                              class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                              name="content"
                                              required>{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tag"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.tag') }}</label>
                                <div class="col-md-6">
                                    <input id="tag" type="text"
                                           class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}"
                                           name="tag" value="{{ old('tag') }}" required>
                                    @if ($errors->has('tag'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tag') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.parentCategory') }}</label>

                                <div class="col-md-6">
                                    {!! Form::select(
                                            'category_id',
                                            \App\Category::pluck('title', "id"),
                                            null,
                                            [
                                                'class' => 'form-control' . $errors->has('category_id') ? ' is-invalid' : ''
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

                            <div class="form-group row">
                                <label for="user_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.author') }}</label>

                                <div class="col-md-6">
                                    {!! Form::select(
                                            'user_id',
                                            \App\User::pluck('name', "id"),
                                            null,
                                            [
                                                'class' => 'form-control' . $errors->has('user_id') ? ' is-invalid' : ''
                                            ]
                                        )
                                    !!}


                                    @if ($errors->has('user_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.status') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publication_time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.releaseDate') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control{{ $errors->has('publication_time') ? ' is-invalid' : '' }}" type="datetime-local" name="publication_time" value="{{ \Carbon\Carbon::now()->format("Y-m-d\TH:i:s") }}">
                                    @if ($errors->has('publication_time'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('publication_time') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('general.image') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" type="file" id="image" accept="image/x-png,image/gif,image/jpeg">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
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