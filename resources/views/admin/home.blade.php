@extends('admin.layouts.app')


@section('bodyTag')
    <body id="page-top">
    @endsection


@section('content')
    {{ Auth::user()->name }}
    @endsection