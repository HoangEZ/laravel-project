<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	@section('style')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('public/admin/style.css')}}">
	@show
</head>
<body>
	<div class="container-fluid">
		<div class="header">
			@section('bar')
			<div class="navbar navbar-expand-lg top-menu">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-bar">
				    <span class="fa fa-bars"></span>
				</button>
				<div class="collapse navbar-collapse" id="menu-bar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="/admin/entry_manage/?nc={{rand(0,100)}}">Quản lý bài đăng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/admin/genre_manage/?nc={{rand(0,100)}}">Quản lý thể loại</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/admin/update_about/?nc={{rand(0,100)}}">Cập nhật giới thiệu</a>
						</li>
					</ul>
				</div>
			</div>
			@if(!empty($user))
			<div class="infor">
				<span>Xin chào, <a id="infor-name" href="#">{{$user}}</a> <a href="{{url('admin/logout')}}" class="btn">Đăng xuất</a></span>
			</div>
			@endif
			@show
		</div>

		@yield('content')
		
	</div>
	@section('script')
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	@show()
	
</body>
</html>