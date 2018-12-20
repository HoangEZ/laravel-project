@extends('template.layout')
@section('title','Bài đăng')
@section('content')
<section id="single-post">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="2.3s">
            <div class="blog-thumb">
               
               <h1>Lorem ipsum dolor sit amet</h1>
                  <div class="post-format">
                    <span>By <a href="#">Elon Musk</a></span>
                    <span><i class="fa fa-date"></i> 4 June 2016, Saturday</span>
                 </div>
               <p>Donec sem sem, egestas sit amet sagittis pellentesque, semper non libero. Nunc iaculis sodales pretium. Sed laoreet, neque vitae vehicula egestas, odio enim ultricies nunc, at venenatis diam libero eu purus. Sed quis quam ullamcorper, tincidunt eros vel, malesuada purus. Mauris risus erat, faucibus in aliquam ut, posuere posuere metus.</p>
               <blockquote>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</blockquote>
               
               <img src="{{url('public/images/blog-img1.jpg')}}" class="img-responsive post-image" alt="Blog">
               <p>Phasellus eget sem tempus, egestas nisl dapibus, aliquet elit. Ut urna turpis, tempor sit amet massa vitae, pulvinar porttitor magna. Pellentesque dolor lorem, blandit ac congue non, mattis a mi. Vestibulum id accumsan neque. Aenean turpis dui, consectetur in ornare quis, sollicitudin vel mauris. Aliquam eros elit, blandit et tortor non, ornare tincidunt ante.</p>
               
               

               <div class="blog-comment">
                 <h3>Comments</h3>
                    <div class="media">
                        <div class="media-object pull-left">
                            <img src="{{url('public/images/comment1.jpg')}}" class="img-responsive" alt="blog">
                       </div>
                      <div class="media-body">
                        <h4 class="media-heading">Jenne leon</h4>
                        <h5>5 June 2016, Sunday</h5>
                        <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus purus augue vulputate voluptate neque, curabitur.</p>
                      </div>
                    </div>
                    <div class="media">
                        <div class="media-object pull-left">
                            <img src="{{url('public/images/comment2.jpg')}}" class="img-responsive" alt="blog">
                       </div>
                      <div class="media-body">
                        <h4 class="media-heading">Jenne leon</h4>
                        <h5>4 June 2016, Saturday</h5>
                        <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus purus augue vulputate voluptate neque, curabitur.</p>
                      </div>
                    </div>
               </div>

               <div class="blog-comment-form">
                  <h3>Leave a comment</h3>
                    <form action="#" method="post">
                      <input type="text" class="form-control" placeholder="Name" name="name" required>
                      <input type="email" class="form-control" placeholder="Email" name="email" required>
                      <textarea class="form-control" placeholder="Comment" rows="5" name"Your Comments" required id="comment"></textarea>
                      <div class="contact-submit">
                        <input name="submit" type="submit" class="form-control" id="submit" value="Submit a comment">
                      </div>
                   </form>
               </div>
            </div>
        </div>

      </div>
   </div>
</section>
@endsection