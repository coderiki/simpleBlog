@extends('admin.layouts.app')

@section('title')
    {{ __('general.listPost') }}
@endsection

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{ __('general.listPost') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>Slug</th>
                        <th>{{ __('general.category') }}</th>
                        <th>{{ __('general.author') }}</th>
                        <th>{{ __('general.status') }}</th>
                        <th>{{ __('general.releaseDate') }}</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>Slug</th>
                        <th>{{ __('general.category') }}</th>
                        <th>{{ __('general.author') }}</th>
                        <th>{{ __('general.status') }}</th>
                        <th>{{ __('general.releaseDate') }}</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->category_id }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td>{{ $post->status }}</td>
                            <td>{{ $post->publication_time }}</td>
                            <td>
                                <a href="{{ route('admin.deletePost', ['id' => $post->id]) }}" class="badge badge-danger">
                                    <i class="fa fa-times text-white"></i> {{ __('general.delete') }}
                                </a>
                                <a href="{{ route('postDetail', ['postSlug' => $post->slug]) }}" class="badge badge-info">
                                    <i class="fa fa-eye text-white"></i> {{ __('general.show') }}
                                </a>
                                <a href="{{ route('admin.editPostView', ['id' => $post->id]) }}" class="badge badge-primary">
                                    <i class="fa fa-edit text-white"></i> {{ __('general.arrangement') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@include('admin.mainStructure.dataTablePush')