@extends('template.layout')
@section('title','Trang chủ')
@section('content')
<section id="portfolio">
   <div class="container">
      <div class="row">

         <div class="col-md-12 col-sm-12">
            
               <!-- iso section -->
               <div class="iso-section wow fadeInUp" data-wow-delay="2.6s">

                  <ul class="filter-wrapper clearfix">
                     <li><a href="#" data-filter="*" class="selected opc-main-bg">Tất cả</a></li>
                     @foreach($genre as $genre_item)
                     <li><a href="#" class="opc-main-bg" data-filter=".genre-{{$genre_item->id}}">{{$genre_item->genre}}</a></li>
                     @endforeach
                  </ul>
                     <!-- iso box section -->
                     
                  <div class="iso-box-section wow fadeInUp" data-wow-delay="1s">
                     <div class="iso-box-wrapper col4-iso-box">
                        @foreach($entry as $entry_item)
                        <div class="iso-box @foreach($entry_item->belong as $belong_item){{'genre-'.$belong_item->genre_id}} @endforeach col-md-4 col-sm-6">
                           <div class="portfolio-thumb">
                              <img src="{{$entry_item->image}}" class="img-responsive" alt="Portfolio">
                                 <div class="portfolio-overlay">
                                    <div class="portfolio-item">
                                          <a href="/entry/{{$entry_item->id}}"><i class="fa fa-link"></i></a>
                                          <h2>{{$entry_item->title}}</h2>
                                       </div>
                                 </div>
                           </div>
                        </div>
                        @endforeach  
                  </div>
               </div>

         </div>

      </div>
   </div>
</section>
@endsection

@section('script')
@parent
<script src="{{url('public/js/isotope.js')}}"></script>
<script src="{{url('public/js/imagesloaded.min.js')}}"></script>
@endsection