@extends('admin.template.layout')
@section('title','Đăng nhập')
@section('infor')
@endsection
@section('content')
	<div class="row">
		<form action="{{url('/loginprocess')}}" method="post" class="login">
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="input_user">Tên đăng nhập</label>
				</div>
				<div class="col-lg">
					<input type="text" class="form-control" id="input_user" aria-describedby="emailHelp" name="user" placeholder="Nhập tên đăng nhập">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-5">
					<label for="input_password">Mật khẩu</label>
				</div>
				<div class="col-lg">
					<input type="password" class="form-control" id="input_password" name="password" placeholder="Password">
				</div>
			</div>
			@csrf
			<button type="submit" name="subm" class="btn btn-primary">Đăng nhập</button>
		</form>
	</div>
@endsection

@section('script')
	@parent
	<script src="{{url('public/admin/js/align.js')}}"></script>
	<script src="{{url('public/admin/js/ajax_login.js')}}"></script>
@endsection