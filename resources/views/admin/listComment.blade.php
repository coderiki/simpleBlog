@extends('admin.layouts.app')

@section('title')
    {{ __('general.listComment') }}
    @endsection

@section('content')
    <!-- DataTables Example -->

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{ __('general.listComment') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.nameSurname') }}</th>
                        <th>{{ __('general.email') }}</th>
                        <th>{{ __('general.ipAdress') }}</th>
                        <th>{{ __('general.comment') }}</th>
                        <th>{{ __('general.post') }}</th>
                        <th>{{ __('general.status') }}</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('general.nameSurname') }}</th>
                        <th>{{ __('general.email') }}</th>
                        <th>{{ __('general.ipAdress') }}</th>
                        <th>{{ __('general.comment') }}</th>
                        <th>{{ __('general.post') }}</th>
                        <th>{{ __('general.status') }}</th>
                        <th>{{ __('general.transaction') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td> {{ $comment->id }}</td>
                            <td> {{ $comment->name }}</td>
                            <td> {{ $comment->email }}</td>
                            <td> {{ $comment->ip }}</td>
                            <td> <textarea style="resize: none" readonly>{{ $comment->comment }}</textarea> </td>
                            <td>
                                <a href="{{ route('postDetail', ['postSlug' => $comment->post->slug]) }}">
                                    {{ $comment->post->title }}
                                </a>
                            </td>
                            <td>
                                @if($comment->status === 0)
                                    <a href="{{ route('admin.editCommentStatusIn', ['id' => $comment->id]) }}" class="badge badge-danger">
                                        {{ __('general.waitingForApproval') }}
                                    </a>
                                    @else
                                    <a href="{{ route('admin.editCommentStatusOut', ['id' => $comment->id]) }}" class="badge badge-primary">
                                        {{ __('general.liveOn') }}
                                    </a>
                                    @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.deleteComment', ['id' => $comment->id]) }}" class="badge badge-danger">
                                    <i class="fa fa-times text-white"></i>
                                    {{ __('general.delete') }}
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