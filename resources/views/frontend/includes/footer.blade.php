<div class="compare_item_box">
  
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="compare_item_lists d-flex align-items-center justify-content-between">
                        <button class="compare_item_box_close"><i class="uil uil-times"></i></button>
                        <ul class="compare_item_list_ul"></ul>
                        <div class="compare_btn_wrap">
                          <button class="compare_pop_btn btn btn-sm btn__red rounded-pill" data-bs-toggle="modal" data-bs-target="#compareModal" data-compare="" data-url="{{route('service.compare')}}" data-storage="{{env('APP_URL').'/storage'}}">Compare now</button>
                        </div>
                    </div>
            </div>
            
        </div>
    </div>
</div>
@include('frontend.includes.model')
<footer class="bg-dark text-inverse lb__footer">
    <div class="container pt-10 py-6 py-md-10">
        <div class="row gy-6 gy-lg-0">
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <img class="mb-4" src="{{ asset('frontend/assets/img/logo-white.png') }}"
                        srcset="{{ asset('frontend/assets/img/logo-white.png') }}" alt="" />
                    <div class="widget_block">
                        <div class="icon">
                            <i class="uil uil-location-pin-alt"></i>
                        </div>
                        <address class="pe-xl-15 pe-xxl-17">
                            Bridge Momtaz Height, Mirpur Main Road, Shyamoli Square,
                            Dhaka-1207
                        </address>
                    </div>
                    <div class="widget_block">
                        <div class="icon">
                            <i class="uil uil-envelope-alt"></i>
                        </div>
                        <a href="mailto:info@loanbazaarbd.com">info@loanbazaarbd.com</a>
                    </div>
                    <div class="widget_block">
                        <div class="icon">
                            <i class="uil uil-incoming-call"></i>
                        </div>
                        <p>+880 1400 022 999</p>
                    </div>
                    <nav class="nav social social-white">
                        <a href="https://www.facebook.com/bdloanbazaar"><i class="uil uil-facebook-f"></i></a>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                        <a href="#"><i class="uil uil-instagram"></i></a>
                        <a href="#"><i class="uil uil-youtube"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->

            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Important Links</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Credit card in bangladesh</a></li>
                        <li><a href="#">Credit card apply</a></li>
                        <li><a href="#">Best credit card in bangladesh</a></li>
                        <li><a href="#">Credit card offers</a></li>
                        <li><a href="#">Credit card charges</a></li>
                        <li><a href="#">Loan interest rate in bangladesh</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-12 col-lg-4">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Our Facebook page</h4>
                    <div class="newsletter-wrapper">
                        <div class="fb-page" data-href="https://www.facebook.com/bdloanbazaar" data-tabs="timeline"
                            data-width="320" data-height="80" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/bdloanbazaar" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/bdloanbazaar">LoanBazaarbd.com</a></blockquote>
                        </div>

                    </div>
                    <!-- /.newsletter-wrapper -->
                    <h4 class="widget-title text-white mt-2 mb-3">Hotline</h4>
                    <div class="emergency_contact_image">
                        <img src="{{ asset('frontend/assets/img/footer/01.jpg') }}" alt="">
                        <img src="{{ asset('frontend/assets/img/footer/02.jpg') }}" alt="">
                        <img src="{{ asset('frontend/assets/img/footer/03.jpg') }}" alt="">
                        <img src="{{ asset('frontend/assets/img/footer/04.jpg') }}" alt="">
                        <img src="{{ asset('frontend/assets/img/footer/05.jpg') }}" alt="">
                        <img src="{{ asset('frontend/assets/img/footer/06.jpg') }}" alt="">
                    </div>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="payment_gateway_option">
                    <img src="{{ asset('frontend/assets/img/ssl_payments.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <small>Copyright© 2022 Loan Bazaar BD Ltd. All rights reserved.</small>
                </div>
                <div class="col-12 col-md-7">
                    <ul class="list-unstyled mb-0 d-flex">
                        <li><a href="{{ url('/about-loanbazaar-bd') }}">About Us</a></li>
                        <li><a href="{{route('page.policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('page.terms')}}">Terms of Use</a></li>
                        <li><a href="{{ route('page.disclaimer') }}">Disclaimer</a></li>
                        <li><a href="{{route('page.complaints')}}">Complaints guide</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
