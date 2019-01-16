@extends('admin.template.layout')
@section('title','Thêm bài đăng')
@section('content')
<form class="mt-3 mx-auto col-lg-10">
    <div class="form-group row">
        <label for="#txtTitle" class="col-lg-2">Tiêu đề</label>
        <input type="text" class="col-lg form-control" name="title" id="txtTitle">
    </div>
    <div class="form-group row">
        <label for="#txtImage" class="col-lg-2">Đường dẫn</label>
        <input type="text" class="col-lg form-control" name="url" id="txtImage">
    </div>
    <div class="form-group row">
        <label for="#txtContent" class="col-lg-2">Đường dẫn</label>
        <div class="col-lg">
            <textarea type="text" name="comment" id="txtContent"></textarea>
        </div>
    </div>
    <input type="submit" value="@if($task=='add') {{'Thêm'}} @else {{'Sửa'}}'" class="btn btn-primary">
</form>
@endsection
@section('script')
<script src="{{url('public/admin/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('comment');
</script>
@endsection