@extends('admin.template.layout')
@section('title','Trang chủ')

@section('content')
<div class="user-infor col-lg-5">
	<ul class="list">
		<li class="border-bottom border-bottom-dark mb-3">
			Tên đăng nhập:<span id="txt-name">{{$user}}</span>
			<span class="fa fa-pencil edit" title="Đổi tên đăng nhập" data-toggle="collapse" data-target="#username-drop"></span>
		</li>
		<li class="form-drop collapse mb-3" id="username-drop">
			<form id="name-form">
				<div class="form-group row">
					<input type="text" name="name" class="form-control col-lg-9">
					@csrf
					<input type="submit" name="submit" class="btn btn-primary col-lg" value="Sửa" disabled>
				</div>
			</form>
		</li>
		<li class="border-bottom border-bottom-dark mb-3">Email: <span id="txt-email">{{$email}}</span>
			<span class="fa fa-pencil edit" title="Cập nhật email" data-toggle="collapse" data-target="#email-drop"></span>
		</li>
		<li class="form-drop collapse mb-3" id="email-drop">
			<form id="email-form">
				<div class="form-group row">
					<input type="text" name="email" class="form-control col-lg-9">
					@csrf
					<input type="submit" name="submit" class="btn btn-primary col-lg" value="Sửa" disabled>
				</div>
			</form>
		</li>
		<li class="border-bottom border-bottom-dark mb-3">Mật khẩu: ****
			<span class="fa fa-pencil edit" title="Đặt lại mật khẩu" data-toggle="collapse" data-target="#password-drop"></span>
		</li>
		<li class="form-drop collapse mb-3" id="password-drop">
			<form id="pass-form">
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu cũ">
				</div>
				<div class="form-group">
					<input type="password" name="new_pass" class="form-control" placeholder="Nhập mật khẩu mới">
				</div>
				<div class="form-group">
					<input type="password" name="new_pass_confirm" class="form-control" placeholder="Nhập lại mật khẩu mới">
				</div>
				@csrf
				<input type="submit" name="submit" value="Đặt lại" class="btn btn-primary" disabled>
			</form>
		</li>
	</ul>
</div>
@endsection


@section('script')
@parent
<script src="{{url('public/admin/js/ajax_user_update.js')}}"></script>
@endsection