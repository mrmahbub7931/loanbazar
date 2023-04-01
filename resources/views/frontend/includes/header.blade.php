<header class="wrapper lb__header main__header">
    <nav class="navbar classic navbar-expand-lg navbar-light navbar-bg-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand"><a href="{{route('front.home')}}"><img
                        src="{{ asset('frontend/assets/img/logo.png') }}" alt="" /></a></div>
            <div class="navbar-collapse offcanvas-nav">
                <div class="offcanvas-header d-lg-none d-xl-none">
                    <a href="start.html"><img src="img/logo-light.png" srcset="img/logo-light@2x.png 2x" alt="" /></a>
                    <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close"
                        aria-label="Close"></button>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.home') }}">Home</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Cards</a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\CardService::all() as $card)

                            <li class="nav-item"><a class="dropdown-item" href="{{route('cards.page.url',$card->slug)}}">{{ $card->service_title }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Loans</a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\LoanService::all() as $loan)

                            <li class="nav-item"><a class="dropdown-item" href="{{route('loans.page.url',$loan->slug)}}">{{ $loan->service_title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Insurance</a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\Insurance::all() as $insurance)
                                <li class="dropdown"><a class="dropdown-item" href="{{ route('insurances.page.url',$insurance->url) }}">{{ $insurance->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Investment</a>-->
                    <!--    <ul class="dropdown-menu">-->
                    <!--        <li class="nav-item"><a class="dropdown-item" href="#">Fixed Deposits</a></li>-->
                    <!--        <li class="nav-item"><a class="dropdown-item" href="#">DPS</a></li>-->
                    <!--        <li class="nav-item"><a class="dropdown-item" href="#">Savings Accounts</a></li>-->
                    <!--        <li class="nav-item"><a class="dropdown-item" href="#">Current Accounts</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Tools</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="dropdown-item" href="{{route('front.tools.emi')}}">EMI & Loan Calculator</a>
                            </li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('front.tools.exchange_rate')}}">Exchange Rate</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="#">Branch Locator</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">About Us</a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\Page::all() as $page)
                            <li class="nav-item"><a class="dropdown-item" href="{{route('pages.url', $page->url)}}">{{ $page->title }}</a></li>
                            </li>
                            @endforeach
                            {{-- <li class="nav-item"><a class="dropdown-item" href="#">Team/Management</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="#">Career</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="#">Media</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Tracking</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.page') }}">Blog</a></li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
                    <li class="nav-item"><a class="nav-link" data-toggle="offcanvas-info"><i
                                class="uil uil-info-circle"></i></a></li>
                    <li class="nav-item">
                        @guest
                        <a href="#" class="btn btn-sm btn__red rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-01">Sign In</a>
                        @else
                          <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}"><i
                          class="uil uil-user-circle"></i></a></li>
                        @endguest
                    </li>
                    <li class="nav-item ms-lg-0">
                        <div class="navbar-hamburger d-lg-none d-xl-none ms-auto"><button
                                class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="modal fade" id="modal-01" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center">
                <div class="modal-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                                type="button" role="tab" aria-controls="register"
                                aria-selected="false">Register</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form class="text-start mb-3" method="POST" action="{{ route('login') }}"
                                autocomplete="off">
                                @csrf

                                <div class="form-label-group mb-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-label-group mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" id="password">
                                    <label for="password">Password</label>
                                </div>
                                <button type="submit" class="btn btn__red btn-sm rounded-pill btn-login w-100 mb-2">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <!-- /form -->

                        </div>

                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form class="text-start mb-3" method="POST" action="{{ route('register') }}"
                                autocomplete="off">
                                @csrf
                                <div class="form-label-group mb-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">
                                    <label for="name">Name</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-label-group mb-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-label-group mb-4">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                    <label for="phone">Phone</label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-label-group mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-label-group mb-4">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="password-confirm">
                                    <label for="password">Confirm Password</label>
                                </div>

                                <button type="submit" class="btn btn__red btn-sm rounded-pill btn-login w-100 mb-2">
                                    {{ __('Register') }}
                                </button>
                            </form>
                        </div>
                    </div>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    @if (Route::has('password.request'))
                    <p class="mb-1"><a href="{{ route('password.request') }}" class="hover">Forgot Password?</a></p>
                    @endif
                    {{-- <div class="divider-icon my-4">or</div>
              <nav class="nav social justify-content-center text-center">
                <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i class="uil uil-facebook-f"></i></a>
                <a href="#" class="btn btn-circle btn-sm btn-twitter"><i class="uil uil-twitter"></i></a>
              </nav> --}}
                    <!--/.social -->
                </div>
                <!--/.modal-content -->
            </div>
            <!--/.modal-body -->
        </div>
        <!--/.modal-dialog -->
    </div>
    <!--/.modal -->
    <div class="offcanvas-info text-inverse">
        <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-info-close"
            aria-label="Close"></button>
        <a href="start.html"><img src="img/logo-light.png" srcset="img/logo-light@2x.png 2x" alt="" /></a>
        <div class="mt-4 widget">
            <p>Loan Bazaar BD is a financial aggregator that helps customers compare multiple retail banking products, Insurance and apply online in minutes.</p>
        </div>
        <!-- /.widget -->
        <div class="widget">
            <h4 class="widget-title text-white mb-3">Contact Info</h4>
            <address> Bridge Momtaz Height, Mirpur Main Road,<br> Shyamoli Square, Dhaka-1207 </address>
            <a href="mailto:first.last@email.com">info@loanbazaarbd.com</a><br /> +880 1400 022 999
        </div>
        <!-- /.widget -->
        <div class="widget">
            <h4 class="widget-title text-white mb-3">Learn More</h4>
            <ul class="list-unstyled">
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <!-- /.widget -->
        <div class="widget">
            <h4 class="widget-title text-white mb-3">Follow Us</h4>
            <nav class="nav social social-white">
                <a href="#"><i class="uil uil-twitter"></i></a>
                <a href="#"><i class="uil uil-facebook-f"></i></a>
                <a href="#"><i class="uil uil-dribbble"></i></a>
                <a href="#"><i class="uil uil-instagram"></i></a>
                <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
        </div>
        <!-- /.widget -->
    </div>
    <!-- /.offcanvas-info -->
</header>
<!-- /header -->
