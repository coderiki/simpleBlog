@extends('admin.layouts.app')

@section('title')
    {{ __('general.settings') }}
    @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('general.settings') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="settingUpdateUrl">
                            @csrf

                            <div class="form-group row">
                                <label for="homeTitle"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.homeTitle') }}</label>
                                <div class="col-md-6">
                                    <input id="homeTitle" type="text"
                                           class="form-control{{ $errors->has('homeTitle') ? ' is-invalid' : '' }}"
                                           name="homeTitle" value="{{ $settings->homeTitle }}" required autofocus>
                                    @if ($errors->has('homeTitle'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('homeTitle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postInCategoryPaginateCount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.postInCategoryPaginateCount') }}</label>
                                <div class="col-md-6">
                                    <input id="postInCategoryPaginateCount" type="number"
                                           class="form-control{{ $errors->has('postInCategoryPaginateCount') ? ' is-invalid' : '' }}"
                                           name="postInCategoryPaginateCount" value="{{ $settings->postInCategoryPaginateCount }}" required>
                                    @if ($errors->has('postInCategoryPaginateCount'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postInCategoryPaginateCount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postInHomePaginateCount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.postInHomePaginateCount') }}</label>
                                <div class="col-md-6">
                                    <input id="postInHomePaginateCount" type="number"
                                           class="form-control{{ $errors->has('postInHomePaginateCount') ? ' is-invalid' : '' }}"
                                           name="postInHomePaginateCount" value="{{ $settings->postInHomePaginateCount }}" required>
                                    @if ($errors->has('postInHomePaginateCount'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postInHomePaginateCount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postInTagPaginateCount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.postInTagPaginateCount') }}</label>
                                <div class="col-md-6">
                                    <input id="postInTagPaginateCount" type="number"
                                           class="form-control{{ $errors->has('postInTagPaginateCount') ? ' is-invalid' : '' }}"
                                           name="postInTagPaginateCount" value="{{ $settings->postInTagPaginateCount }}" required>
                                    @if ($errors->has('postInTagPaginateCount'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postInTagPaginateCount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="commentInPostCount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.commentInPostCount') }}</label>
                                <div class="col-md-6">
                                    <input id="commentInPostCount" type="number"
                                           class="form-control{{ $errors->has('commentInPostCount') ? ' is-invalid' : '' }}"
                                           name="commentInPostCount" value="{{ $settings->commentInPostCount }}" required>
                                    @if ($errors->has('commentInPostCount'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commentInPostCount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="commentDefaultStatus"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.commentDefaultStatus') }}</label>
                                <div class="col-md-6">
                                    <select
                                            id="commentDefaultStatus"
                                            name="commentDefaultStatus"
                                            class="form-control{{ $errors->has('commentDefaultStatus') ? ' is-invalid' : '' }}"
                                            required>
                                        <option value="0"{{ $settings->commentDefaultStatus === 0 ? ' selected' : '' }}>{{ __('general.passive') }}</option>
                                        <option value="1"{{ $settings->commentDefaultStatus === 1 ? ' selected' : '' }}>{{ __('general.active') }}</option>
                                    </select>
                                    @if ($errors->has('commentDefaultStatus'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commentDefaultStatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postDefaultImage"
                                       class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.postDefaultImage') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control{{ $errors->has('postDefaultImage') ? ' is-invalid' : '' }}" name="postDefaultImage" type="file" id="postDefaultImage" accept="image/x-png,image/gif,image/jpeg">
                                    <img class="img-fluid rounded post-detail-image" src="{{ asset($settings->postDefaultImage) }}">
                                    @if ($errors->has('postDefaultImage'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postDefaultImage') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="present_image_path" value="{{ $settings->postDefaultImage }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('general.update') }}
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