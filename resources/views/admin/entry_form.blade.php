@extends('admin.template.layout')
@section('title','Thêm bài đăng')
@section('content')
<form class="mt-3 mx-3">
    <div class="form-group">
        <label for="#txtTitle">Tiêu đề</label>
        <input type="text" name="title" id="txtTitle">
    </div>
    <div class="form-group">
        <label for="#txtImage">Đường dẫn</label>
        <input type="text" name="url" id="txtImage">
    </div>
    <input type="submit" value="ok">
</form>
@endsection