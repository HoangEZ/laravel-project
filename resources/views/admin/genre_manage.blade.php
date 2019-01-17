@extends('admin.template.layout')
@section('title','Quản lý thể loại')
@section('content')
    <span id="token" class="d-none">{!! @csrf_token() !!}</span>
    <div id="list-genre" class="container-fluid">
        @foreach ($datas as $data)
            <span class="badge badge-pill badge-danger mx-1 span-genre" data-id="{{ $data->id }}">{{ $data->genre }}<span class="fa fa-times badge-del"></span></span>
        @endforeach
    </div>
@endsection
@section('script')
    @parent
    <script src="{{ url('/public/admin/js/ajax_functions.js') }}"></script>
    <script src="{{ url('/public/admin/js/ajax_deletegenre.js') }}"></script>
@endsection