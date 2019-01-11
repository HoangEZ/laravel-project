@extends('template.layout')
@section('title','Bài đăng')
@section('content')
<section id="blog">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="1s">
              <div class="blog-thumb">
                  <a href="/blog-detail"><img src="{{url('/public/images/blog-img1.jpg')}}" class="img-responsive" alt="Blog"></a>
                  <a href="/blog-detail"><h1>Flying the Clouds</h1></a>
                    <div class="post-format">
                          <span>By <a href="#">Frank Wang</a></span>
                          <span><i class="fa fa-date"></i> 5 June 2016, Sunday</span>
                      </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                    <a href="/blog-detail" class="btn btn-default">Full Article</a>
                </div>
          </div>

          <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="1.6s">
              <div class="blog-thumb">
                  <a href="/blog-detail"><img src="{{url('/public/images/blog-img2.jpg')}}" class="img-responsive" alt="Blog"></a>
                  <a href="/blog-detail"><h1>Walk in the Moon</h1></a>
                      <div class="post-format">
                          <span>By <a href="#">Elon Musk</a></span>
                          <span><i class="fa fa-date"></i> 4 June 2016, Saturday</span>
                      </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                    <a href="/blog-detail" class="btn btn-default">Read More</a>
              </div>
          </div>

        

          <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
              <div class="blog-thumb">
                  <a href="/blog-detail"><img src="{{url('/public/images/blog-img3.jpg')}}" class="img-responsive" alt="Blog"></a>
                  <a href="/blog-detail"><h1>Swim the Pool</h1></a>
                      <div class="post-format">
                          <span>By <a href="#">Jack Ma</a></span>
                          <span><i class="fa fa-date"></i> 3 June 2016, Friday</span>
                      </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    <a href="/blog-detail" class="btn btn-default">Details</a>
              </div>
          </div>

        <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="2.2s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img4.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>Talking the Sun</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Sandar</a></span>
                    <span><i class="fa fa-date"></i> 2 June 2016, Thursday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                 <a href="/blog-detail" class="btn btn-default">Read More</a>
            </div>
        </div>

        <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="2s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img5.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>View the Mountain</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Cindy</a></span>
                    <span><i class="fa fa-date"></i> 1 June 2016, Wednesday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                 <a href="/blog-detail" class="btn btn-default">Full Story</a>
            </div>
        </div>

        <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="2.4s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img6.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>Mountain</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Linda</a></span>
                    <span><i class="fa fa-date"></i> 31 May 2016, Tuesday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                 <a href="/blog-detail" class="btn btn-default">Read More</a>
            </div>
        </div>

        <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1.5s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img7.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>Cloud</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Bill Gates</a></span>
                    <span><i class="fa fa-date"></i> 30 May 2016, Monday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                 <a href="/blog-detail" class="btn btn-default">Details</a>
            </div>
        </div>

        <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img8.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>Blue Sky</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Elon Musk</a></span>
                    <span><i class="fa fa-date"></i> 29 May 2016, Sunday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                 <a href="/blog-detail" class="btn btn-default">Read More</a>
            </div>
        </div>

        <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1.3s">
            <div class="blog-thumb">
               <a href="/blog-detail"><img src="{{url('/public/images/blog-img9.jpg')}}" class="img-responsive" alt="Blog"></a>
               <a href="/blog-detail"><h1>Forest</h1></a>
                  <div class="post-format">
                    <span>By <a href="#">Jack Ma</a></span>
                    <span><i class="fa fa-date"></i> 28 May 2016, Saturday</span>
                 </div>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                 <a href="/blog-detail" class="btn btn-default">Details</a>
            </div>
        </div>
        
        <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="1.3s">
          <h1>Interdum et malesuada fames</h1>
          <p>Sed quis laoreet purus, a luctus ligula. Suspendisse nec urna a dolor sodales venenatis. Donec et sem quam. Fusce faucibus neque sit amet arcu auctor tincidunt. Etiam feugiat nibh orci, quis sagittis velit pretium ac. Suspendisse egestas ex a dolor dictum gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis urna id odio consequat fringilla.</p>
          <p>Integer eu rhoncus libero. Nulla dignissim laoreet eros quis interdum. Proin ut placerat dui, eget vehicula ipsum. Mauris id molestie eros. Vestibulum fringilla dui nunc, vitae euismod ligula consectetur eget. Sed accumsan, ipsum in scelerisque euismod, nisi quam placerat urna, ac porttitor augue sapien varius velit.</p>
       </div>

      </div>
   </div>
</section>
@endsection