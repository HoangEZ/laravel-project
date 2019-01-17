@extends('template.layout')
@section('title','Bài đăng')
@section('header')
	<section id="header" class="header-three">
		<div class="container">
			<div class="row">
	
				<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
						<div class="header-thumb">
								<h1 class="wow fadeIn" data-wow-delay="0.6s">Các tác giả</h1>
						  </div>
				</div>
	
			</div>
		</div>		
	</section>
@endsection
@section('content')
<section id="about">
	<div class="container">
		<div class="row">
			<div class="wow fadeInUp" data-wow-delay="0.3s">
				{!! $data->about !!}
			</div>
		</div>
	</div>
</section>
@endsection