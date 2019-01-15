@extends('admin.template.layout')
@section('title','Quản lý bài viết')
@section('content')
<div class="content mx-3">
	<a href="/admin/entry_add" class="btn btn-primary mt-3"><span class="fa fa-plus"></span> Thêm</a>
	<a href="#" class="btn btn-danger mt-3"><span class="fa fa-trash"></span> Xóa chọn</a>
	<a href="#" class="btn btn-danger mt-3"><span class="fa fa-trash"></span> Xóa hết</a>
	<table class="table table-striped mt-3">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tiêu đề</th>
	      <th scope="col">Chỉnh sửa bình luận</th>
	      <th scope="col">Xem thêm</th>
	      <th scope="col">Cập nhật</th>
	      <th scope="col">Chọn</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@php 
	  		$i=1
	  	@endphp
	  	@foreach ($data as $data_item)
	    <tr>
	      <th scope="row">{{$i++}}</th>
	      <td>{{mb_substr($data_item->title,0,50)}}</td>
	      <td><a href="{{url('/admin/comment/'.$data_item->id)}}"class="badge badge-pill badge-success">...</a></td>
	      <td><a href="{{url('/entry/'.$data_item->id)}}" class="badge badge-pill badge-primary" target="_blank">...</a></td>
	      <td><a href="{{url('/admin/entry_edit/'.$data_item->id)}}"><span class="fa fa-pencil"></span></a></td>
	      <td><input type="checkbox" name="update"></td>
	    </tr>
	    @endforeach
	  </tbody>
	  </table>
</div>
@endsection