@extends('frontend.layouts.master')


@section('title', $post->title)

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-md-10 col-xl-8 mx-auto">
          <div class="post-header">
            <div class="post-category text-line">
              <a href="#" class="hover" rel="category">{{ $post->categories[0]->name }}</a>
            </div>
            <!-- /.post-category -->
            <h1 class="display-1 mb-4">{{ $post->title }}</h1>
            <ul class="post-meta mb-5">
              <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ date('F d, Y', strtotime($post->created_at)) }}</span></li>
              <li class="post-author"><a href="#"><i class="uil uil-user"></i><span>By {{getUsername($post->user_id)}}</span></a></li>
              {{-- <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>3<span> Comments</span></a></li>
              <li class="post-likes"><a href="#"><i class="uil uil-heart-alt"></i>3<span> Likes</span></a></li> --}}
            </ul>
            <!-- /.post-meta -->
          </div>
          <!-- /.post-header -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="blog single mt-n17">
                <div class="card">
                  <figure class="card-img-top"><img src="{{Storage::disk('public')->url('frontend/assets/img/blog/cover/'.$post->cover_img)}}" alt="" /></figure>
                  <div class="card-body">
                    <div class="classic-view">
                      <article class="post">
                            {!! $post->body !!}
                      </article>
                      <!-- /.post -->
                    </div>
                    <!-- /.classic-view -->
                    
                    <hr />
                    <h3 class="mb-6">You Might Also Like</h3>
                    <div class="carousel owl-carousel blog grid-view mb-16" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "2"}}'>
                      @foreach ($post->categories as $postcategory)
                      {{-- {{ dd($postcategory) }} --}}
                        @foreach ($postcategory->posts as $categorypost)
                            {{-- {{ dd($categorypost) }} --}}
                        
                      @if ($post->id !== $categorypost->id)    
                      <div class="item">
                        <article>
                          <figure class="overlay overlay1 hover-scale rounded mb-5"><a href="{{ route('post.url',$categorypost->slug) }}"> <img src="{{ Storage::disk('public')->url('frontend/assets/img/blog/featured/'.$categorypost->featured_img) }}" alt="" /></a>
                            <figcaption>
                              <h5 class="from-top mb-0">Read More</h5>
                            </figcaption>
                          </figure>
                          <div class="post-header">
                            <div class="post-category text-line">
                              <a href="#" class="hover" rel="category">{{ $post->categories[0]->name }}</a>
                            </div>
                            <!-- /.post-category -->
                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ route('post.url',$categorypost->slug) }}">{{$categorypost->title}}</a></h2>
                          </div>
                          <!-- /.post-header -->
                          <div class="post-footer">
                            <ul class="post-meta mb-0">
                              <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ date('F d, Y', strtotime($post->created_at)) }}</span></li>
                              {{-- <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>4</a></li> --}}
                            </ul>
                            <!-- /.post-meta -->
                          </div>
                          <!-- /.post-footer -->
                        </article>
                        <!-- /article -->
                      </div>
                      <!-- /.item -->
                      @endif
                      @endforeach
                      @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.blog -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
@endsection