@extends('frontend.layouts.master')
@php
    $title = $insurance ? $insurance->title : 'Insurance Page';
@endphp
@section('title',  $title)

@section('content')
    @if ($insurance)
        
    <section class="wrapper bg-soft-light lb__page__header visa__card" style="background-image: url({{ Storage::disk('public')->url('frontend/assets/img/insurances/'.$insurance->header_image) }})">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">{{ $insurance->title }}</h1>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">{{ $insurance->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="wrapper lb__services_card bg-soft-leaf pt-12">
        <div class="container">
            <div class="row">
                  <div class="col">
                    <h2 class="display-4 mb-3 text-center">Choose Your <span class="font__color_red">{{ $insurance->title }}</span></h2>
                  </div>
            </div>
            @if ($insurance->url == 'bike-insurance' || $insurance->url == 'car-insurance')
            <div class="row">
                <div class="col-12 col-md-4 py-8">
                    <p>For online <strong>{{ $insurance->title }}</strong> policy Please fill-in the required information, so that our team can get in touch with you.</p>
                   <form action="{{ route('front.insurance_lg.apply') }}" class="lc__apply__form" method="POST" enctype="multipart/form-data">
                       @csrf
                           <input type="hidden" value={{ $insurance->url }} name="insurance_type" id="insurance_type">
                           @include('frontend.includes.bike_car_form')

                   <div class="col-12 text-center">
                       <button type="submit" class="btn btn-sm btn__red"> Submit </button>
                   </div>
               </form>
                </div>
                <div class="offset-md-1 col-12 col-md-7 py-8">
                   <div class="insurance_post_details pt-5 text_align_justify">
                       {!! $insurance->description !!}
                   </div>
                </div>
           </div>
            @else
            @if (count($insurancePosts) > 0)
            <div class="row">
                @foreach ($insurancePosts as $post)
                <div class="col-12 col-md-3 col-xs-3">
                    <article>
                        <figure class="overlay overlay1 hover-scale rounded mb-5"><a href="{{ route('insurances.post.url',['page' => $insurance->url, 'post' => $post->url]) }}"><span class="bg"></span> <img src="{{ Storage::disk('public')->url('frontend/assets/img/insurances/posts/'.$post->featured_image) }}" alt=""></a>
                          <figcaption>
                            <h5 class="from-top mb-0">View Details</h5>
                          </figcaption>
                        </figure>
                        <div class="post-header">
                          <div class="post-category text-line">
                            <a href=":;" class="hover" rel="category">{{$insurance->title }}</a>
                          </div>
                          <!-- /.post-category -->
                          <h3 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ route('insurances.post.url',['page' => $insurance->url, 'post' => $post->url]) }}">{{ $post->title }}</a></h3>
                        </div>
                        
                      </article>
                </div>
                @endforeach
            </div> 
            @endif   
            @endif 
        </div>    
    </section>
    
@endsection