@extends('admin.template.layout')
@section('title','Đăng ký')
@section('content')
<div class="col-lg-6 mx-auto mt-3">
	<form id="register-form" data-action="{{url('admin/register')}}">
		<div class="form-group row">
			<label for="txt_name" class="col-lg-4">Tên</label>
			<input type="text" id="txt_name" class="form-control col-lg" name="name" required>
		</div>
		<div class="form-group row">
			<label for="txt_email" class="col-lg-4">Email</label>
			<input type="email" id="txt_email" class="form-control col-lg" name="email" required>
		</div>
		<div class="form-group row">
			<label for="txt_password" class="col-lg-4">Mật khẩu</label>
			<input type="password" id="txt_password" class="form-control col-lg" name="password" autocomplete="off" required>
		</div>
		<div class="form-group row">
			<label class="col-lg-4">Nhập lại mật khẩu</label>
			<input type="password" class="form-control col-lg" name="password_compare" autocomplete="off" required>
		</div>
		<div class="form-group text-center">
			<span class="text-danger d-none" id="pass_missmatch">Mật khẩu không khớp</span>
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Đăng ký" disabled>
		@csrf
	</form>
</div>
@endsection
@section('script')
@parent
<script src='https://www.google.com/recaptcha/api.js?render=6LeqdokUAAAAAM9A0wdTfa-o8HupazbcL2TCZ1Lx'></script>
<script src="{{url('public/admin/js/register_validation.js')}}"></script>
<script src="{{url('public/admin/js/ajax_register.js')}}"></script>
@endsection