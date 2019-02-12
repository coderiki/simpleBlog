@extends('admin.layouts.app')



@section('content')
    {{ Auth::user()->name }}
    @endsection