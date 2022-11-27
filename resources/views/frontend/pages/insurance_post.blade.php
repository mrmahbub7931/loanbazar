@extends('frontend.layouts.master')
@php
    $title = $singlePost ? $singlePost->title : 'Insurance Page';
@endphp
@section('title',  $title)

@section('content')
    {{-- {{ dd($singlePost->getInsurancePostParent->title) }} --}}
    @if ($singlePost)
        
    <section class="wrapper bg-soft-light lb__page__header visa__card" style="background-image: url()">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">{{ $singlePost->title }}</h1>
                        
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="#">{{$singlePost->getInsurancePostParent->title}}</a></li>
                            <li class="active">{{ $singlePost->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="wrapper lb__services_card bg-soft-leaf pt-12">
        <div class="container py-12 py-md-12">
            <div class="row">
                 <div class="col-12 col-md-4">
                     <p>For online <strong>{{ $singlePost->getInsurancePostParent->title }}</strong> policy Please fill-in the required information, so that our team can get in touch with you.</p>
                    <form action="{{ route('front.insurance_lg.apply') }}" class="lc__apply__form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($singlePost->getInsurancePostParent->url == 'life-insurance' || $singlePost->getInsurancePostParent->url == 'general-insurance')
                            <input type="hidden" value={{ $singlePost->getInsurancePostParent->url }} name="insurance_type" id="insurance_type">
                            @include('frontend.includes.life_general_form')
                        @else 
                        <input type="hidden" value={{ $singlePost->getInsurancePostParent->url }} name="insurance_type" id="insurance_type"> 
                            @include('frontend.includes.bike_car_form')
                        @endif

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-sm btn__red"> Submit </button>
                    </div>
                </form>
                 </div>
                 <div class="offset-md-1 col-12 col-md-7">
                    <div class="action__btn pdf_file">
                        <a href="{{ Storage::disk('public')->url('frontend/assets/files/insurances/posts/pdf/'.$singlePost->pdf_file) }}" download class="view_pdf_file action__btn__link">View PDF</a>
                    </div>
                    <div class="insurance_post_details pt-5 text_align_justify">
                        {!! $singlePost->description !!}
                    </div>
                 </div>
            </div>
        </div>    
    </section>
    
@endsection