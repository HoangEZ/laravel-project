@extends('admin.template.layout')
@section('title','Thêm bài đăng')
@section('content')
<span id="token" class="d-none">{!!@csrf_token()!!}</span>
<form class="mt-3 mx-auto col-lg-10" @if($task=='update') {!!'id="form-update"'!!} @else {!!'id="form-add"'!!} @endif>
    <div class="form-group row">
        <label for="#txtTitle" class="col-lg-2" @if($task=='update') {{'data-id="'.$data->id.'"'}} @endif>Tiêu đề</label>
        <input type="text" class="col-lg form-control" name="title" id="txt-title" @if($task=='update') {{'value="'.$data->title.'"'}} @endif>
    </div>
    <div class="form-group row">
        <label for="#txtImage" class="col-lg-2">Đường dẫn</label>
        <input type="text" class="col-lg form-control" name="url" id="txt-image" @if($task=='update') {{'value="'.$data->image.'"'}} @endif>
    </div>
    <div class="form-group row">
        <label for="#txtContent" class="col-lg-2">Nội dung</label>
        <div class="col-lg">
            <textarea type="text" name="content" id="txt-content">
                @if($task=='update') {{$data->image}} @endif
            </textarea>
        </div>
    </div>
    <input type="submit" value="@if($task=='add') {{'Thêm'}} @else {{'Sửa'}}@endif" class="btn btn-primary">
</form>
@endsection
@section('script')
<script src="{{url('public/admin/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script src="{{url('public/admin/js/ajax_functions.js')}}"></script>
<script src="{{url('public/admin/js/ajax_addcomment.js')}}"></script>
@endsection