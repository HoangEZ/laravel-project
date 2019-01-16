@extends('admin.template.layout')
@section('title','Duyệt bình luận')
@section('content')
<div class="content mx-3">
	<span id="token" class="d-none">{{csrf_token()}}</span>
	<table class="table table-stripped mt-3" id="comment-table">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Thời gian</th>
				<th>Ảnh</th>
				<th>Nội dung</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach($data as $data_item)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$data_item->name}}</td>
				<td>{{$data_item->email}}</td>
				<td>{{$data_item->date}}</td>
				<td><img src="{{url($data_item->url)}}"></td>
				<td>{{$data_item->comment}}</td>
				<td>
					@if($data_item->pending)
						{!!'<button class="btn btn-primary accept" data-id="'.$data_item->id.'" disabled>Duyệt</button>'!!}
					@else
						{!!'<button class="btn btn-success reject" data-id="'.$data_item->id.'" href="#">Bỏ duyệt</button>'!!}
					@endif
				</td>
				<td><span class="fa fa-times text-danger btn-del" data-id="{{$data_item->id}}"></span></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('script')
@parent
<script src="{{url('public/admin/js/ajax_acceptcomment.js')}}"></script>
@endsection