@extends('admin.template.layout')
@if($task=='add')
@section('title','Thêm bài đăng')
@else($task=='update')
@section('title','Cập nhật bài đăng')
@endif
@section('content')
<span id="token" class="d-none">{!!@csrf_token()!!}</span>
<form class="mt-3 mx-auto col-lg-10" @if($task=='update') {!!'id="form-update"'!!} @else {!!'id="form-add"'!!} @endif>
    <div class="form-group row">
        <label for="#txt-title" class="col-lg-2">Tiêu đề</label>
        <input required type="text" class="col-lg form-control" name="title" id="txt-title" @if($task=='update') data-id="{{$id}}" value="{{$data->title}}" @endif>
    </div>
    <div class="form-group row">
        <label for="#txt-image" class="col-lg-2">Đường dẫn</label>
        <input required type="url" class="col-lg form-control" name="url" id="txt-image" @if($task=='update') value="{{$data->image}}" @endif>
    </div>
    <div class="form-group">
        <label id="genre-list" for="#sel-genre">
            Thể loại: 
            @if($task=='update')
                @foreach ($belongs as $belong)
                <span class="badge badge-pill badge-primary mx-1 span-genre" data-id="{{ $belong->id }}">{{ $belong->genre }}<span class="fa fa-times badge-del"></span></span>
                @endforeach
            @endif
        </label>
        <div class="row">
            <div class="col-lg-2"></div>
            <select name="genre" id="sel-genre" class="col-lg-2 from-control">
                @php($i=1)
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" @if($i++==1) selected="selected" @endif class="form-control">{{ $genre->genre }}</option>
                @endforeach
            </select>
            <button type="button" id="btn-add" class="btn btn-primary mx-2"><span class="fa fa-plus"></span></button>
        </div>
    </div>
    <div class="form-group row">
        <label for="#txt-content" class="col-lg-2">Nội dung</label>
        <div class="col-lg">
            <textarea type="text" name="content" id="txt-content">
                @if($task=='update') {{$data->content}} @endif
            </textarea>
        </div>
    </div>
    <input disabled name="submit" type="submit" value="@if($task=='add') {{'Thêm'}} @else {{'Sửa'}}@endif" class="btn btn-primary">
</form>
@endsection
@section('script')
@parent
<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('txt-content');
</script>
<script src="{{url('public/admin/js/ajax_functions.js')}}"></script>
<script src="{{url('public/admin/js/delete_genre.js')}}"></script>
<script src="{{url('public/admin/js/add_genre.js')}}"></script>
@if ($task=='add')
    <script src="{{url('public/admin/js/ajax_addentry.js')}}"></script>
@else
    <script src="{{url('public/admin/js/ajax_updateentry.js')}}"></script>
@endif
@endsection