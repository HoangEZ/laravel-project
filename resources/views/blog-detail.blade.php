@extends('template.layout')
@section('title','Bài đăng')
@section('header')
<section id="header" class="header-five">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">{{$data->title}}</h1>
              <h3 class="wow fadeInUp" data-wow-delay="0.9s">Người đăng: {{$data->name}}</h3>
          </div>
      </div>

    </div>
  </div>    
</section>
@stop
@section('content')
<section id="single-post">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="2.3s">
            <div class="blog-thumb">
               
               <h1>{{$data->title}}</h1>
                  <div class="post-format">
                    <span>Đăng bởi: <a href="#">{{$data->name}}</a></span>
                    <span><i class="fa fa-date"></i> {{$data->date}}</span>
                 </div>
               {!!$data->content!!}
               
               

               <div class="blog-comment">
                 <h3>Bình luận</h3>
                    @foreach($comment as $cmt_item)
                    <div class="media">
                        <div class="media-object pull-left">
                            <img src="{{url($cmt_item->url)}}" class="img-responsive" alt="blog">
                       </div>
                      <div class="media-body">
                        <h4 class="media-heading">{{$cmt_item->name}}</h4>
                        <h5>{{$cmt_item->date}}</h5>
                        <p>{{$cmt_item->comment}}</p>
                      </div>
                    </div>
                    @endforeach
               </div>

               <div class="blog-comment-form">
                  <h3>Bình luận</h3>
                    <form action="#" data-action="{{url('add-comment')}}" method="post" id="cmtForm">
                      <input type="text" class="form-control" placeholder="Tên" name="name" required>
                      <input type="email" class="form-control" placeholder="Email" name="email" required>
                       <input type="url" class="form-control" placeholder="Ảnh đại diện" name="avatar" required id="image">
                       <canvas id="canv" width="80" height="80"></canvas>
                       <div class="btn-crop fa fa-crop" id="crop"></div>
                      <textarea class="form-control" placeholder="Comment" rows="5" name="comment" required id="comment"></textarea>
                      <div class="contact-submit">
                        <input name="submit" type="submit" class="form-control" id="submit" value="Gửi bình luận">
                      </div>
                      @csrf
                   </form>
               </div>
            </div>
        </div>

      </div>
   </div>
</section>
@endsection
@section('script')
@parent
<script src='https://www.google.com/recaptcha/api.js?render=6Lf2mocUAAAAAOm-UPuADWlyazGzDeHRyat_vgNR'></script>
<script src="{{url('public/js/comment_validation.js')}}"></script>
<script src="{{url('public/js/ajax_comment.js')}}"></script>
@stop