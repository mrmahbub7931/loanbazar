@extends('frontend.layouts.master')


@section('title', 'Blog')

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
          <h1 class="display-1 mb-3">Business News</h1>
          <p class="lead px-lg-5 px-xxl-8">Welcome to our journal. Here you can find the latest company news and business articles.</p>
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
          <div class="blog grid grid-view mt-8">
            <div class="row isotope gx-md-8 gy-8 mb-8">
            @if (count($posts) < 1)
                
            
            @foreach ($posts as $post)
              <article class="item post col-md-6">
                <div class="card">
                  <figure class="card-img-top overlay overlay1 hover-scale"><a href="{{ route('post.url',$post->slug) }}"> <img src="{{ Storage::disk('public')->url('frontend/assets/img/blog/featured/'.$post->featured_img) }}" alt="" /></a>
                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="card-body">
                    <div class="post-header">
                    @foreach ($post->categories as $postcategory)
                    <div class="post-category text-line">
                      <a href="#" class="hover" rel="category">{{ $postcategory->name }}</a>
                    </div>
                    @endforeach
                    <!-- /.post-category -->
                      <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ route('post.url',$post->slug) }}">{{ $post->title }}</a></h2>
                    </div>
                    <!-- /.post-header -->
                    {{-- <div class="post-content">
                      <p>{!! $post->body !!}</p>
                    </div> --}}
                    <!-- /.post-content -->
                  </div>
                  <!--/.card-body -->
                  <div class="card-footer">
                    <ul class="post-meta d-flex mb-0">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ date('F d, Y', strtotime($post->created_at)) }}</span></li>
                      {{-- <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>4</a></li>
                      <li class="post-likes ms-auto"><a href="#"><i class="uil uil-heart-alt"></i>5</a></li> --}}
                    </ul>
                    <!-- /.post-meta -->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </article>
              <!-- /.post -->
            @endforeach
            @else
            <h2 class="post-title h3 mt-1 mb-3">No posts found!</h2>
            @endif
            </div>
            <!-- /.row -->
          </div>
          <!-- /.blog -->
          {!! $posts->links() !!}
          <!-- /nav -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
@endsection