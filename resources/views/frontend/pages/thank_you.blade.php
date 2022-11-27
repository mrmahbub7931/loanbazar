@extends('frontend.layouts.master')

@section('title', 'Thank you')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="thanks_page_content">
                        @if (session()->has('appliedPerson'))
                            @php
                                $data = session()->get('appliedPerson');
                            @endphp
                        
                        <h3>Congratulations! <span>{{ $data['tracking_info']->full_name }}. Your application is successfully submitted, one of our expertise contact with you as soon as possible</span> </h3>
                        <div class="icon"><i class="uil uil-check"></i></div>
                        <p>Your Tracking number is <span>{{ $data['tracking_info']->tracking_id }}</span> </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
