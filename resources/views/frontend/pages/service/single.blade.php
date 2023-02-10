@extends('frontend.layouts.master')

@section('title', $singleService->title)

@section('content')
    <section class="wrapper bg-soft-light lb__page__header" style="background-image: url('{{ Storage::disk('public')->url('frontend/assets/img/services/'.$singleService->service_cover_img) }}')">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">{{ $singleService->title }}</h1>
                        <p class="text-white">{{$singleService->short_desc}}</p>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">{{ $singleService->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-light">
        <div class="container py-12">
            <div class="row">
                <div class="col-md-8 col-12">
                    <article class="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="post-content">{{ $singleService->body }}</div>
                            </div>
                        </div>
                    </article>
                </div>
                {{-- <div class="col-md-4 col-12"></div> --}}
                {{-- !-- /column --> --}}
          <aside class="col-lg-4 sidebar ">
            <div class="widget card px-8 py-8">
              <h4 class="widget-title mb-3">About Us</h4>
              <p >Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.</p>
              <nav class="nav social">
                <a href="#"><i class="uil uil-twitter"></i></a>
                <a href="#"><i class="uil uil-facebook-f"></i></a>
                <a href="#"><i class="uil uil-dribbble"></i></a>
                <a href="#"><i class="uil uil-instagram"></i></a>
                <a href="#"><i class="uil uil-youtube"></i></a>
              </nav>
              <!-- /.social -->
              <div class="clearfix"></div>
            </div>
            <!-- /.widget -->
            <div class="widget card px-8 py-8">
              <h4 class="widget-title mb-3">Popular Services</h4>
              <ul class="image-list">
                <li>
                  <figure class="rounded"><a href="blog-post.html"><img src="img/photos/a1.jpg" alt="" /></a></figure>
                  <div class="post-content">
                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Magna Mollis Ultricies</a> </h6>
                    <ul class="post-meta">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>26 Mar 2021</span></li>
                      <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>3</a></li>
                    </ul>
                    <!-- /.post-meta -->
                  </div>
                </li>
                <li>
                  <figure class="rounded"> <a href="blog-post.html"><img src="img/photos/a2.jpg" alt="" /></a></figure>
                  <div class="post-content">
                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Ornare Nullam Risus</a> </h6>
                    <ul class="post-meta">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>16 Feb 2021</span></li>
                      <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>6</a></li>
                    </ul>
                    <!-- /.post-meta -->
                  </div>
                </li>
                <li>
                  <figure class="rounded"><a href="blog-post.html"><img src="img/photos/a3.jpg" alt="" /></a></figure>
                  <div class="post-content">
                    <h6 class="mb-2"> <a class="link-dark" href="blog-post.html">Euismod Nullam Fusce</a> </h6>
                    <ul class="post-meta">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>8 Jan 2021</span></li>
                      <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>5</a></li>
                    </ul>
                    <!-- /.post-meta -->
                  </div>
                </li>
              </ul>
              <!-- /.image-list -->
            </div>
            <!-- /.widget -->

          </aside>
          <!-- /column .sidebar -->
            </div>
        </div>
    </section>
@endsection
