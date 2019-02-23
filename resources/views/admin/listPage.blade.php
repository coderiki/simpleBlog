@extends('admin.layouts.app')

@section('title')
    {{ __('general.listPages') }}
    @endsection


@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{ __('general.listPages') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>content</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.title') }}</th>
                        <th>content</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <textarea style="resize: none;" class="form-control" readonly>{{ $page->content }}</textarea>
                            </td>
                            <td>
                                <a href="{{ route('admin.deletePage', ['id' => $page->id]) }}" class="badge badge-danger">
                                    <i class="fa fa-times text-white"></i> {{ __('general.delete') }}
                                </a>
                                <a href="{{ route('pageDetail', ['slug' => $page->slug]) }}" class="badge badge-info">
                                    <i class="fa fa-eye text-white"></i> {{ __('general.show') }}
                                </a>
                                <a href="{{ route('admin.editPageView', ['id' => $page->id]) }}" class="badge badge-primary">
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