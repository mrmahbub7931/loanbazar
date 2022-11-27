@extends('frontend.layouts.master')

@php
    $title = $page ? $page->title : '';
@endphp
@section('title',  $title)

@section('content')
@if ($page->url == 'about-us')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-20 pt-md-14 pb-md-23 text-center">
      <div class="row">
        <div class="col-xl-5 mx-auto mb-6">
          <h1 class="display-1 mb-3">{{$page->title }}</h1>
          <p class="lead mb-0">{!! $page->meta_desc !!}</p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
  <section class="wrapper bg-light">
    <div class="container pb-10 pb-md-10">
      <div class="row text-center mb-12 mb-md-8">
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-n18 mt-md-n22">
          <figure><img class="w-auto" src="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }}" srcset="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }} 2x" alt="" /></figure>
        </div>
        <!-- /column -->
      </div>
      <div class="row">
        <div class="col-12">
            {!! $page->body !!}
        </div>
      </div>
    </div>
  </section>
  
  <section class="separator bg-soft-leaf pb-12">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <div class="section__heading">
                  <h1 class="heading">Our Corporate Partners</h1>
                  <p class="intro-small">Presentinng Banking Plan & Services</p>
                </div>
            </div>
        </div>
        <div class="row text-center" data-cues="zoomIn" data-delay="100">
            <div class="col-12">
                <div id="partners__flex" class="owl-carousel">
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/1.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/2.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/3.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/4.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/5.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    
                    <div class="item">
                        <div class="card shadow-lg h-100 align-items-center">
                            <div class="card-body align-items-center d-flex px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ asset('frontend/assets/img/brands/6.png') }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>

                </div>
            </div>
            
        </div>
        <div class="row text-center justify-content-center align-items-center mt-4" data-cues="zoomIn" data-group="images">
            <h2 class="fs-21 text-uppercase text-black text-center mb-12 mt-15">Helping you choose from our trusted
                financial partners</h2>
            <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false"
                data-autoplay="true" data-autoplay-timeout="3000"
                data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1200":{"items": "6"}, "1400":{"items": "7"}}'>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/1.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/2.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/3.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/4.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/5.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/6.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/7.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/8.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/9.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/10.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/11.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/12.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/13.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/14.jpg') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/15.png') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/16.png') }}" alt="" /></div>
                <div class="item px-5"><img src="{{ asset('frontend/assets/img/brands/financial/17.png') }}" alt="" /></div>
            </div>
            <!-- /.owl-carousel -->
        </div>
    </div>
</section>

    @elseif($page->url == 'team-management')
    <section class="wrapper bg-light wrapper-border">
        <div class="container py-14 py-md-16">
          <div class="row mb-3">
            <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">
              <p class="display-4 mb-3 px-lg-14"><strong>{!! $page->body !!}</strong></p>
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
          <div class="position-relative">
            <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div>
            <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1" style="top: 0.5rem; left: -1.7rem;"></div>
            <div class="carousel owl-carousel gap-small" data-margin="0" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}, "1400":{"items": "4"}}'>
              @foreach (\App\Models\Team::all() as $team)
                  
                <div class="item">
                  <div class="item-inner">
                    <div class="card">
                      <div class="card-body">
                        <img class=" w-25 mb-4" src="{{ Storage::disk('public')->url('frontend/assets/img/teams/'.$team->team_image) }}" srcset="{{ Storage::disk('public')->url('frontend/assets/img/teams/'.$team->team_image) }} 2x" alt="" />
                        <h4 class="mb-1">{{$team->name}}</h4>
                        <div class="meta mb-2">{{$team->designation}}</div>
                        <nav class="nav social mb-0">
                          <a href="{{$team->facebook_url}}" target="_blank"><i class="uil uil-facebook-f"></i></a>
                          <a href="{{$team->linkedin_url}}" target="_blank"><i class="uil uil-linkedin"></i></a>
                          <a href="{{$team->instagram_url}}" target="_blank"><i class="uil uil-instagram"></i></a>
                        </nav>
                        <!-- /.social -->
                      </div>
                      <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.item-inner -->
                </div>
                <!-- /.item -->
              @endforeach
              
            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.position-relative -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
    @elseif($page->url == 'career')
    <section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-20 pt-md-14 pb-md-23 text-center">
        <div class="row">
          <div class="col-xl-5 mx-auto mb-6">
            <h1 class="display-1 mb-3">{{$page->title }}</h1>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <section class="wrapper bg-light">
      <div class="container pb-10 pb-md-10">
        <div class="row text-center mb-12 mb-md-8">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-n18 mt-md-n22">
            <figure><img class="w-auto" src="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }}" srcset="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }} 2x" alt="" /></figure>
          </div>
          <!-- /column -->
        </div>
        <div class="row">
          <div class="col-12">
              <p>{!! $page->body !!}</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-md-5">
              <div class="career_job_list_left_img">
                <img src="{{ asset('/frontend/assets/img/career2.png') }}" alt="">
              </div>
          </div>
          <div class="col-12 col-md-7">
              <div class="job_lists">
                  <h3>Job Lists</h3>
                  <ul>
                    @foreach (\App\Models\Circular::latest()->take(5)->get() as $circular)  
                      <li><a href="{{ route('circular.url', $circular->slug) }}">{{ $circular->job_title }}</a>
                          <span>{{ $circular->job_location }}</span>
                      </li>
                    @endforeach
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </section>
    @else
    <section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-20 pt-md-14 pb-md-23 text-center">
        <div class="row">
          <div class="col-xl-5 mx-auto mb-6">
            <h1 class="display-1 mb-3">{{$page->title }}</h1>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <section class="wrapper bg-light">
      <div class="container pb-10 pb-md-10">
        <div class="row text-center mb-12 mb-md-8">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-n18 mt-md-n22">
            <figure><img class="w-auto" src="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }}" srcset="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }} 2x" alt="" /></figure>
          </div>
          <!-- /column -->
        </div>
        <div class="row">
          <div class="col-12">
              <p>{!! $page->body !!}</p>
          </div>
        </div>

        <div class="row gy-10 light-gallery-wrapper">
          @foreach (\App\Models\Media::all() as $item)
            <div class="item col-md-4">
              <figure class="lift rounded mb-4 media-bg"><a href="{{ Storage::disk('public')->url('frontend/assets/img/media/'.$item->file) }}" class="lightbox"><img src="{{ Storage::disk('public')->url('frontend/assets/img/media/'.$item->file) }}" srcset="{{ Storage::disk('public')->url('frontend/assets/img/media/'.$item->file) }} 2x" alt="" /></a></figure>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection