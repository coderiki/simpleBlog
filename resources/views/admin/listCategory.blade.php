@extends('admin.layouts.app')

@section('title')
    {{ __('general.listCategory') }}
    @endsection



@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{ __('general.listCategory') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>Slug</th>
                        <th>{{ __('general.explanation') }}</th>
                        <th>{{ __('general.queue') }}</th>
                        <th>{{__('general.parent')}} ID</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>Slug</th>
                        <th>{{ __('general.explanation') }}</th>
                        <th>{{ __('general.queue') }}</th>
                        <th>{{__('general.parent')}} ID</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->explanation }}</td>
                            <td>{{ $category->queue }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <a href="{{ route('admin.deleteCategory', ['id' => $category->id]) }}" class="badge badge-danger">
                                    <i class="fa fa-times text-white"></i> {{ __('general.delete') }}
                                </a>
                                <a href="{{ route('category', ['categorySlug' => $category->slug]) }}" class="badge badge-info">
                                    <i class="fa fa-eye text-white"></i> {{ __('general.show') }}
                                </a>
                                <a href="{{ route('admin.editCategoryView', ['id' => $category->id]) }}" class="badge badge-primary">
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