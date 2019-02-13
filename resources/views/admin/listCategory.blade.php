@extends('admin.layouts.app')

@section('title')
    {{ __('general.listCategory') }}
    @endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
    @endpush

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
                                <a href="{{ route('admin.deleteCategory', ['id' => $category->id]) }}" class="float-left">
                                    <i class="fa fa-times text-danger"></i>
                                </a>
                                <a href="{{ route('admin.editCategoryView', ['id' => $category->id]) }}" class="float-right">
                                    <i class="fa fa-edit text-primary"></i>
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

@push('scripts')
    <!-- Page level plugin JavaScript-->
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @endpush