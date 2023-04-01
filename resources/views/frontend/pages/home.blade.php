@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
{{-- slider section --}}
<section class="lb__main_slider slider__bg__green">
    <div class="full__height">
        <div id="main__carousel" class="owl-carousel">
            @if (count($sliders) > 0)

            @foreach ($sliders as $slider)
            <div class="item">
                <div class="slide__content__wrapper">
                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-md-6 col-12">
                                <div class="content">
                                    <div class="lb__heading">
                                        <h1 class="heading" data-cue="slideInLeft" data-duration="2000">{!! $slider->title !!}</h1>
                                        <p class="intro" data-cue="fadeIn" data-duration="2000">{!! strip_tags($slider->description) !!}</p>
                                    </div>
                                    <div class="action__btn">
                                        <a href="{{$slider->btn_url}}" class="action__btn__link"> <i class="uil uil-arrow-right fs-21"></i>
                                            {{$slider->btn_txt}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1 d-md-block d-none">
                                <div class="slide__img">
                                    <img src="{{ Storage::disk('public')->url('frontend/assets/img/slider/'.$slider->image_src) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            {{-- end item --}}
        </div>
    </div>
</section>
{{-- end slider section --}}

{{-- best deal --}}
<section class="separator bg-soft-green" id="lb__deal_section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                    <h1 class="heading">Select your best deal</h1>
                    <p class="intro-small">Our Picks for the Hottest Offers and Coolest Deal’s all in one Place.</p>
                </div>
            </div>
        </div>
        <div class="row" data-cue="zoomIn" data-delay="600">
            <div class="col-12">
                <div id="best__deal__slider" class="owl-carousel">
                    @foreach ($deals as $deal)

                    <div class="item">
                        <div class="card shadow">
                            <div class="img">
                                <img src="{{ Storage::disk('public')->url('frontend/assets/img/deals/'.$deal->img_src) }}" alt="">
                            </div>
                            <div class="body__content">
                                <ul class="icon-list bullet-bg bullet-soft-green">
                                    @foreach ($deal->getDealsBody as $dealBody)

                                        @php
                                            $bodyArr = json_decode($dealBody->body);
                                        @endphp
                                        @foreach ($bodyArr as $item)

                                            <li><span><i class="uil uil-check"></i></span><span>{{ $item }}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                            <div class="body__action__btn">
                                <a href="{{ $deal->btn_url }}" class="action__btn text-white"> <i class="uil uil-arrow-right fs-21"></i>
                                    {{ $deal->btn_txt }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
{{-- end best deal --}}
{{-- best service --}}
<section class="separator bg-soft-leaf" id="lb__deal_service">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                    <h1 class="heading">Our Services</h1>
                    <p class="intro-small">Whatever the retail banking product you are looking for, we are the best to give the best comparison.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($services as $service)

            <div class="col-lg-4 col-sm-6 col-12" data-cues="slideInUp" data-delay="100">
                <div class="services">
                    <div class="services-title-icon d-flex align-items-center">
                        <div class="services-icon">
                            <img src="{{ Storage::disk('public')->url('frontend/assets/img/services/'.$service->icon_image) }}" alt="">
                        </div>
                        <h4 class="services-title">{{$service->title}}</h4>
                    </div>
                    <div class="services-content">
                        <p class="text">{{$service->short_desc}}</p>
                        <a class="services-btn" href="{{ $service->url }}">{{$service->btn_txt}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- end best service --}}

{{-- lb__image__section --}}
<section class="separator pb-8 lb__gradient__green" id="lb__image__section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                    <h1 class="heading">Why Loanbazar BD!</h1>
                    <p class="intro-small">There's More Than One Reason to Sign Up With Confidence</p>
                </div>
            </div>
        </div>
        {{-- <div class="row" data-cues="slideInLeft" data-delay="600">
            <div class="col-md-8 offset-md-2">
                <div class="desktop__large_img">
                    <img src="{{ asset('frontend/assets/img/why-loanbazar.jpg') }}" alt="">
                </div>
                <div class="mobile__sm_img">
                    <img src="" alt="">
                </div>
            </div>
        </div> --}}
    </div>
    <div class="desktop__large_img">
        @if (\App\Models\HomeImage::latest()->get())
            @foreach (\App\Models\HomeImage::latest()->get() as $image)
                <img src="{{ Storage::disk('public')->url('frontend/assets/img/homeimg/'.$image->image) }}" alt="">
            @endforeach
        @endif
    </div>
    <div class="mobile__sm_img">
        <img src="" alt="">
    </div>
</section>
{{-- end lb__image__section --}}

<section class="wrapper bg-light">
    <div class="container py-12 py-md-12">
        <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                    <h1 class="heading">Delighting Customers Across Bangladesh.</h1>
                    <p class="intro-small">Don’t Just take it from Us, Let Our Customers do the talking.</p>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1"
                style="bottom: 0.5rem; right: -1.7rem;"></div>
            <div class="shape bg-dot primary rellax w-16 h-16" data-rellax-speed="1" style="top: -1rem; left: -1.7rem;">
            </div>
            <div class="carousel owl-carousel gap-small" data-margin="0" data-dots="false" data-nav="true" data-autoplay="true"
                data-autoplay-timeout="5000"
                data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'>
                @foreach (\App\Models\Review::all() as $review)
                <div class="item">
                    <div class="item-inner">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="icon mb-0">
                                    <p>“{!!$review->body!!}”</p>
                                    <div class="blockquote-details">
                                        <img class="rounded-circle w-12"
                                            src="{{ asset('frontend/assets/img/avatars/avatar_loan.jpg') }}"
                                            srcset="{{ Storage::disk('public')->url('/frontend/assets/img/reviews/'.$review->avatar) }}" alt="" />
                                        <div class="info">
                                            <h5 class="mb-1">-{{$review->name}}</h5>
                                            <p class="mb-1">{{ $review->designation }}</p>
                                            <p class="mb-0 font__color_red">{{ $review->company_name }}</p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- /.card-body -->
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
@php
    $counter = \App\Models\Counter::latest()->first();
@endphp
@if($counter)
<section class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map"
    data-image-src="{{ asset('frontend/assets/img/map.png') }}">
    <div class="container py-10 pt-md-12 pb-md-12">
        <div class="row pt-md-12">
            <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
                <h2 class="fs-15 text-uppercase text-muted mb-3">Join Our Community</h2>
                <h3 class="display-4 mb-8 px-lg-12" data-cues="fadeIn">{{$counter->title}}</h3>
            </div>
            <!-- /.row -->
        </div>
        <!-- /column -->
        <div class="row pb-md-12">
            <div class="col-md-12 col-lg-12 col-xl-12 mx-auto">
                <div class="row align-items-center counter-wrapper gy-4 gy-md-0">

                    <div class="col-md-4 text-center" data-cues="slideInLeft" data-delay="200">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex d-lg-block d-xl-flex flex-row">
                                    <div>
                                        <div
                                            class="icon btn btn-circle btn-lg btn-soft-purple disabled mx-auto me-4 mb-lg-3 mb-xl-0">
                                            <i class="uil uil-atm-card"></i> </div>
                                    </div>
                                    <div>
                                        <h3 class="counter mb-1" style="visibility: visible;">{{$counter->card_disbursed}}</h3>
                                        <p class="mb-0">Credit Card Disbursed</p>
                                    </div>
                                </div>
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                    <!--/column -->
                    <div class="col-md-4 text-center" data-cues="slideInDown" data-delay="300">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex d-lg-block d-xl-flex flex-row">
                                    <div>
                                        <div
                                            class="icon btn btn-circle btn-lg btn-soft-purple disabled mx-auto me-4 mb-lg-3 mb-xl-0">
                                            <i class="uil uil-chat-bubble-user"></i> </div>
                                    </div>
                                    <div>
                                        <h3 class="counter mb-1" style="visibility: visible;">{{$counter->client_served}}</h3>
                                        <p class="mb-0">Clients Served</p>
                                    </div>
                                </div>
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                    <!--/column -->
                    <div class="col-md-4 text-center" data-cues="slideInRight" data-delay="400">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex d-lg-block d-xl-flex flex-row">
                                    <div>
                                        <div
                                            class="icon btn btn-circle btn-lg btn-soft-purple disabled mx-auto me-4 mb-lg-3 mb-xl-0">
                                            <i class="uil uil-money-stack"></i> </div>
                                    </div>
                                    <div>
                                        <h3 class="counter mb-1" style="visibility: visible;">{{$counter->loan_disbursed}}</h3>
                                        <p class="mb-0">Core loan Disbursed</p>
                                    </div>
                                </div>
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                    <!--/column -->

                </div>
                <!--/.row -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endif
<!-- /section counter -->
@php
    $cpartners = \App\Models\CorporatePartners::latest()->get();
    $fpartners = \App\Models\FinancialPartners::latest()->get();
@endphp
<section class="separator bg-soft-leaf pb-12">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <div class="section__heading">
                  <h1 class="heading">Our Corporate Partners</h1>
                </div>
            </div>
        </div>
        <div class="row text-center" data-cues="zoomIn" data-delay="100">
            <div class="col-12">
                @isset($cpartners)
                <div id="partners__flex">

                    @foreach (\App\Models\CorporatePartners::latest()->get() as $corprate)
                    <div class="item">
                        <div class="card shadow-lg h-100">
                            <div class="card-body px-3 py-6">
                                <figure class="px-md-3 mb-0"><img src="{{ Storage::disk('public')->url('frontend/assets/img/corporates/'.$corprate->corporate_logo) }}" alt="">
                                </figure>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    @endforeach
                    {{-- @foreach (\App\Models\CorporatePartners::latest()->get() as $corprate)
                    <div class="item">
                        <figure class="px-md-3 mb-0"><img src="{{ Storage::disk('public')->url('frontend/assets/img/corporates/'.$corprate->corporate_logo) }}" alt="">
                        </figure>
                    </div>
                    @endforeach --}}
                </div>
                @endisset
            </div>

        </div>
        <div class="row text-center justify-content-center align-items-center mt-4" data-cues="zoomIn" data-group="images">
            <h2 class="fs-21 text-uppercase text-black text-center mb-12 mt-15">Helping you choose from our trusted
                financial partners</h2>
            @isset($fpartners)
            <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false"
                data-autoplay="true" data-autoplay-timeout="3000"
                data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1200":{"items": "6"}, "1400":{"items": "7"}}'>
                @foreach ($fpartners as $financial)
                    <div class="item px-5"><img src="{{ Storage::disk('public')->url('frontend/assets/img/financials/'.$financial->financial_logo) }}" alt="" /></div>
                @endforeach

            </div>
            <!-- /.owl-carousel -->
            @endisset
        </div>
    </div>
</section>
{{-- blog section --}}
<section class="wrapper bg-light">
    <div class="container py-12 py-md-12">
        <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                  <h1 class="heading">Our Blog</h1>
                  <p class="intro-small">Have a Special Need? We Can Help.</p>
                </div>
            </div>
        </div>
        <div class="carousel owl-carousel blog grid-view" data-margin="30" data-dots="false" data-nav="true" data-autoplay="false"
            data-autoplay-timeout="5000"
            data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "2"}, "1200":{"items": "3"}}'>
            @foreach (\App\Models\Post::latest()->get() as $post)
            <div class="item">
                <article>
                    <figure class="overlay overlay1 hover-scale rounded mb-5"><a href="{{ route('post.url',$post->slug) }}"> <img
                                src="{{ Storage::disk('public')->url('frontend/assets/img/blog/featured/'.$post->featured_img) }}" alt="" /></a>
                        <figcaption>
                            <h5 class="from-top mb-0">Read More</h5>
                        </figcaption>
                    </figure>
                    <div class="post-header">
                        <div class="post-category text-line">
                                <a href="#" class="hover" rel="category">{{ $post->categories[0]->name }}</a>
                        </div>
                        <!-- /.post-category -->
                        <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ route('post.url',$post->slug) }}">{{ $post->title }}</a></h2>
                    </div>
                    <!-- /.post-header -->
                    <div class="post-footer">
                        <ul class="post-meta">
                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ date('F d, Y', strtotime($post->created_at)) }}</span></li>
                            {{-- <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>4</a></li> --}}
                        </ul>
                        <!-- /.post-meta -->
                    </div>
                    <!-- /.post-footer -->
                </article>
                <!-- /article -->
            </div>
            @endforeach
            <!-- /.item -->
        </div>
        <!-- /.owl-carousel -->
    </div>
    <!-- /.container -->
</section>
{{-- end blog section --}}
@endsection
