@extends('template.layout')
@section('title','Bài đăng')
@section('content')
<section id="single-project">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-4" data-wow-delay="2.3s">
         <div class="project-info">
            <h4>Tác giả</h4>
            <p>{{$data->tg}}</hp>
         </div>
         <div class="project-info">
            <h4>Date</h4>
            <p>{{$data->date}}</hp>
         </div>
         <div class="project-info">
            <h4>Category</h4>
            <p>@foreach($category as $cat) {{$cat->genre}} @if(!$loop->last) {{', '}} @endif @endforeach</p>
         </div>
      </div>

      <div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="2.6s">
         {{$data->content}}
      </div>

      </div>
   </div>
</section>
@endsection