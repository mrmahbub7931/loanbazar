@extends('frontend.layouts.master')

@php
    $title = $circular ? $circular->job_title : '';
@endphp
@section('title',  $title)

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-md-10 col-xl-8 mx-auto">
          <div class="post-header">
            <div class="post-category text-line">
              <a href="#" class="hover" rel="category">Job Location: {{$circular->job_location}}</a>
            </div>
            <!-- /.post-category -->
            <h1 class="display-1 mb-4">{{ $circular->job_title }}</h1>
            <ul class="post-meta mb-5">
              <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ \Carbon\Carbon::parse($circular->created_at)->format('d M Y')}}</span></li>
              <li class="post-author"><a href="#"><i class="uil uil-user"></i><span>By {{getUsername($circular->user_id)}}</span></a></li>
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
              <div class="card-body">
                <div class="classic-view">
                  <article class="post">
                    <div class="post-content mb-5">
                        {!! $circular->job_description !!}
                    </div>
                    <!-- /.post-content -->

                  </article>
                  <!-- /.post -->
                </div>
                <!-- /.classic-view -->
                


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