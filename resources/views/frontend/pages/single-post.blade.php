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
                    <div class="author-info d-md-flex align-items-center mb-3">
                      <div class="d-flex align-items-center">
                        <figure class="user-avatar"><img class="rounded-circle" alt="" src="{{Storage::disk('public')->url('frontend/assets/img/writers/'.$post->writer->writer_image)}}" /></figure>
                        <div>
                          <h6><a href="#" class="link-dark">{{$post->writer->writer_name}}</a></h6>
                          <span class="post-meta fs-15">Writer</span>
                        </div>
                      </div>
                      {{-- <div class="mt-3 mt-md-0 ms-auto">
                        <a href="#" class="btn btn-sm btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-file-alt"></i> All Posts</a>
                      </div> --}}
                    </div>
                    <!-- /.author-info -->
                    @isset($post->writer->writer_bio)
                    <p>{!! $post->writer->writer_bio !!}</p>
                    @endisset
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
                    <hr />
                  <div id="comments">
                    <h3 class="mb-6">5 Comments</h3>
                    <ol id="singlecomments" class="commentlist">
                      <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                          <div class="d-flex align-items-center">
                            {{-- <figure class="user-avatar"><img class="rounded-circle" alt="" src="img/avatars/u2.jpg" /></figure> --}}
                            <div>
                              <h6 class="comment-author"><a href="#" class="link-dark">Nikolas Brooten</a></h6>
                              <ul class="post-meta">
                                <li><i class="uil uil-calendar-alt"></i>21 Feb 2021</li>
                              </ul>
                              <!-- /.post-meta -->
                            </div>
                            <!-- /div -->
                          </div>
                          <!-- /div -->
                          <div class="mt-3 mt-md-0 ms-auto">
                            <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-comments"></i> Reply</a>
                          </div>
                          <!-- /div -->
                        </div>
                        <!-- /.comment-header -->
                        <p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare faucibus mollis.</p>
                        <ul class="children">
                          <li class="comment">
                            <div class="comment-header d-md-flex align-items-center">
                              <div class="d-flex align-items-center">
                                {{-- <figure class="user-avatar"><img class="rounded-circle" alt="" src="img/avatars/u3.jpg" /></figure> --}}
                                <div>
                                  <h6 class="comment-author"><a href="#" class="link-dark">Pearce Frye</a></h6>
                                  <ul class="post-meta">
                                    <li><i class="uil uil-calendar-alt"></i>22 Feb 2021</li>
                                  </ul>
                                  <!-- /.post-meta -->
                                </div>
                                <!-- /div -->
                              </div>
                              <!-- /div -->
                              {{-- <div class="mt-3 mt-md-0 ms-auto">
                                <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-comments"></i> Reply</a>
                              </div> --}}
                              <!-- /div -->
                            </div>
                            <!-- /.comment-header -->
                            <p>Cras mattis consectetur purus sit amet fermentum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis.</p>
                          </li>
                        </ul>
                      </li>
                    </ol>
                  </div>
                  <!-- /#comments -->
                    <hr />
                    <h3 class="mb-3">Would you like to share your thoughts?</h3>
                    {{-- <p class="mb-7">Your email address will not be published. Required fields are marked *</p> --}}
                    @auth
                    <form class="comment-form" action="" method="POST">
                      @csrf
                      {{-- <div class="form-label-group mb-4">
                        <input type="text" class="form-control" placeholder="Name*" id="c-name">
                        <label for="c-name">Name *</label>
                      </div> --}}
                      {{-- <div class="form-label-group mb-4">
                        <input type="email" class="form-control" placeholder="Email*" id="c-email">
                        <label for="c-email">Email*</label>
                      </div>
                      <div class="form-label-group mb-4">
                        <input type="text" class="form-control" placeholder="Website" id="c-web">
                        <label for="c-web">Website</label>
                      </div> --}}
                      <div class="form-label-group mb-4">
                        <textarea name="textarea" class="form-control" rows="5" placeholder="Comment"></textarea>
                        <label>Comment *</label>
                      </div>
                      <button type="submit" class="btn btn-sm btn__red rounded-pill">Submit</button>
                    </form>
                    @endauth
                    <!-- /.comment-form -->
                    @guest
                        First you need to <a href="#" data-bs-toggle="modal"
                        data-bs-target="#modal-01">login</a> from here then write your comment
                    @endguest
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