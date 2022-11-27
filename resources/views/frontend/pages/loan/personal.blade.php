@extends('frontend.layouts.master')

@section('title','Visa Card')

@section('content')
    <section class="wrapper bg-soft-light lb__page__header visa__card">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">Personal Loan</h1>
                        <p class="text-white">It refers to a sum lent to one party (the borrower) by the other party (banks & FIs) for a period fixed upon mutual
                            agreement with a commitment to repay the same with interest/profit under a pre-agreed time schedule for the purpose of
                            purchasing household durables or meeting urgent needs.</p>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Personal Loan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper lb__services_card bg-soft-leaf pt-12">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="item-service mb-3">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-2 p-0 pr-15">
                                <div class="left-content">
                                    <img src="{{ asset('frontend/assets/img/loan/personal-loan/1.jpg') }}" alt="">
                                    <a href="javascript:;" class="cmp__btn service__btn__outline">Add Compare</a>
                                    <a href="javascript:;" class="apl__btn service__btn bg-green">Apply Now</a>
                                </div>
                            </div>
                            <div class="col-md-8 p-0 pl-15 pr-15 bl-dotted br-dotted">
                                <div class="middle-content">
                                    <div class="top_notice">
                                        <p>Apply Now & Get 50% Annual Fee Free</p>
                                    </div>
                                    <div class="middle_items">
                                        <div class="row align-items-center">
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Interest Free Period</strong> </p>
                                                    <p class="info">0.55 BDT/Thousand</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Annual Fee</strong> </p>
                                                    <p class="info">45 Days</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Card Cheque Processing</strong> </p>
                                                    <p class="info">1st Year 50% Free</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Free Supplementary Card</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="details">
                                                    <p class="title"> <strong>Withdrawal Limit</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom_notice">
                                        <p> <i class="uil uil-arrow-right"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center p-0 pl-15">
                                <div class="btn btn-circle icon btn btn-circle disabled mb-4">
                                    <i class="uil uil-file-search-alt fs-40 color__green"></i>
                                </div>
                                <a href="javascript:;" class="r__btn service__btn bg-green" data-bs-toggle="modal" data-bs-target="#required__docs">Required Documents</a>
                                <a href="javascript:;" class="q__btn plan__btn" data-bs-toggle="collapse" data-bs-target="#quick__details_1" aria-expanded="true" aria-controls="quick__details_1">Quick Details <i class="uil uil-expand-arrows-alt"></i> </a>
                            </div>
                        </div>
                        <div id="quick__details_1" class="collapse" aria-labelledby="quick__details_1" data-bs-target="#quick__details-1" style="">
                            <div class="row quick__details__row">
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Fees & Charges</strong> </p>
                                        <ul>
                                            <li>Lorem ipsum dolor sit.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                        </ul>    
                                    </div>    
                                </div>    
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Features</strong> </p>
                                        <ul>
                                            <li>Lorem ipsum dolor sit.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                        </ul>    
                                    </div> 
                                </div>    
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Eligibility</strong> </p>
                                        <ul>
                                            <li>Lorem ipsum dolor sit.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis.</li>
                                            <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                        </ul>    
                                    </div>     
                                </div>    
                            </div> 
                        </div>
                    </div>
                    {{-- single item service end --}}
                    
                    <div class="item-service mb-3">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-2 p-0 pr-15">
                                <div class="left-content">
                                    <img src="{{ asset('frontend/assets/img/loan/personal-loan/2.jpg') }}" alt="">
                                    <a href="javascript:;" class="cmp__btn service__btn__outline">Add Compare</a>
                                    <a href="javascript:;" class="apl__btn service__btn bg-green">Apply Now</a>
                                </div>
                            </div>
                            <div class="col-md-8 p-0 pl-15 pr-15 bl-dotted br-dotted">
                                <div class="middle-content">
                                    <div class="top_notice">
                                        <p>Apply Now & Get 50% Annual Fee Free</p>
                                    </div>
                                    <div class="middle_items">
                                        <div class="row align-items-center">
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Interest Free Period</strong> </p>
                                                    <p class="info">0.55 BDT/Thousand</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Annual Fee</strong> </p>
                                                    <p class="info">45 Days</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Card Cheque Processing</strong> </p>
                                                    <p class="info">1st Year 50% Free</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Free Supplementary Card</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="details">
                                                    <p class="title"> <strong>Withdrawal Limit</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom_notice">
                                        <p> <i class="uil uil-arrow-right"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center p-0 pl-15">
                                <div class="btn btn-circle icon btn btn-circle disabled mb-4">
                                    <i class="uil uil-file-search-alt fs-40 color__green"></i>
                                </div>
                                <a href="javascript:;" class="r__btn service__btn bg-green" data-bs-toggle="modal" data-bs-target="#required__docs">Required Documents</a>
                                <a href="javascript:;" class="q__btn plan__btn">Quick Details <i class="uil uil-expand-arrows-alt"></i> </a>
                            </div>
                        </div>
                    </div>
                    {{-- single item service end --}}
                    <div class="item-service mb-3">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-2 p-0 pr-15">
                                <div class="left-content">
                                    <img src="{{ asset('frontend/assets/img/loan/personal-loan/3.jpg') }}" alt="">
                                    <a href="javascript:;" class="cmp__btn service__btn__outline">Add Compare</a>
                                    <a href="javascript:;" class="apl__btn service__btn bg-green">Apply Now</a>
                                </div>
                            </div>
                            <div class="col-md-8 p-0 pl-15 pr-15 bl-dotted br-dotted">
                                <div class="middle-content">
                                    <div class="top_notice">
                                        <p>Apply Now & Get 50% Annual Fee Free</p>
                                    </div>
                                    <div class="middle_items">
                                        <div class="row align-items-center">
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Interest Free Period</strong> </p>
                                                    <p class="info">0.55 BDT/Thousand</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Annual Fee</strong> </p>
                                                    <p class="info">45 Days</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Card Cheque Processing</strong> </p>
                                                    <p class="info">1st Year 50% Free</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Free Supplementary Card</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="details">
                                                    <p class="title"> <strong>Withdrawal Limit</strong> </p>
                                                    <p class="info">1,000 BDT</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom_notice">
                                        <p> <i class="uil uil-arrow-right"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center p-0 pl-15">
                                <div class="btn btn-circle icon btn btn-circle disabled mb-4">
                                    <i class="uil uil-file-search-alt fs-40 color__green"></i>
                                </div>
                                <a href="javascript:;" class="r__btn service__btn bg-green" data-bs-toggle="modal" data-bs-target="#required__docs">Required Documents</a>
                                <a href="javascript:;" class="q__btn plan__btn">Quick Details <i class="uil uil-expand-arrows-alt"></i> </a>
                            </div>
                        </div>
                    </div>
                    {{-- single item service end --}}

                </div>    
            </div>    
        </div>    
    </section>
    <section class="bg-light py-12 lb__disclaimer__section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card bg-soft-ash">
                        <div class="card-body">
                            <p class="disclaimer__box"> <strong>Disclaimer: </strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quidem error vitae, officia excepturi alias vel labore adipisci nobis! Aliquid dolorum impedit cumque sequi est aperiam veniam culpa natus enim molestiae nesciunt a quos reiciendis error, accusamus exercitationem repudiandae consequatur placeat recusandae saepe aliquam corrupti praesentium! Minima animi dolorum laudantium.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper py-12 py-md-12 bg-soft-leaf">

        <div class="container">
          <div class="row text-center">
            <div class="col-12">
                <div class="section__heading">
                    <h1 class="heading">F.A.Q</h1>
                    <p class="intro-small">Presentinng Banking Plan & Services</p>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-lg-6 mb-0">
              <div id="accordion-1" class="accordion-wrapper card__accordion">
                <div class="card">
                  <div class="card-header" id="accordion-heading-1-1">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-1" aria-expanded="false" aria-controls="accordion-collapse-1-1"> <i class="uil uil-question-circle color__red fs-20"></i> Can I cancel my subscription?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-1-1" class="collapse" aria-labelledby="accordion-heading-1-1" data-bs-target="#accordion-1">
                    <div class="card-body">
                        <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-1-2">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-2" aria-expanded="false" aria-controls="accordion-collapse-1-2"><i class="uil uil-question-circle color__red fs-20"></i>Which payment methods do you accept?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-1-2" class="collapse" aria-labelledby="accordion-heading-1-2" data-bs-target="#accordion-1">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-1-3">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-3" aria-expanded="false" aria-controls="accordion-collapse-1-3"><i class="uil uil-question-circle color__red fs-20"></i>How can I manage my Account?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-1-3" class="collapse" aria-labelledby="accordion-heading-1-3" data-bs-target="#accordion-1">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-1-4">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-4" aria-expanded="false" aria-controls="accordion-collapse-1-4"><i class="uil uil-question-circle color__red fs-20"></i>Is my credit card information secure?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-1-4" class="collapse" aria-labelledby="accordion-heading-1-4" data-bs-target="#accordion-1">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.accordion-wrapper -->
            </div>
            <!--/column -->
            <div class="col-lg-6">
              <div id="accordion-2" class="accordion-wrapper card__accordion">
                <div class="card">
                  <div class="card-header" id="accordion-heading-2-1">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-1" aria-expanded="false" aria-controls="accordion-collapse-2-1"><i class="uil uil-question-circle color__red fs-20"></i>How do I get my subscription receipt?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-1" class="collapse" aria-labelledby="accordion-heading-2-1" data-bs-target="#accordion-2">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-2-2">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2"><i class="uil uil-question-circle color__red fs-20"></i>Are there any discounts for people in need?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-2-3">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-3" aria-expanded="false" aria-controls="accordion-collapse-2-3"><i class="uil uil-question-circle color__red fs-20"></i>Do you offer a free trial edit?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-3" class="collapse" aria-labelledby="accordion-heading-2-3" data-bs-target="#accordion-2">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header" id="accordion-heading-2-4">
                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-4" aria-expanded="false" aria-controls="accordion-collapse-2-4"><i class="uil uil-question-circle color__red fs-20"></i>How do I reset my Account password?</button>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-4" class="collapse" aria-labelledby="accordion-heading-2-4" data-bs-target="#accordion-2">
                    <div class="card-body">
                      <div class="faq__desc">
                            <p> Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Cras justo odio, dapibus ac facilisis.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.accordion-wrapper -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
      
      <div class="modal fade" id="required__docs" tabindex="-1">
        <div class="modal-dialog required__docs modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-body">
              <div class="header">
                  <h3>Required Documents</h3>
                  <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="left__docs_info">
                            <div class="list__item mb-4">
                                <p> <strong class="bg__green">Documents for Salaried person: </strong> </p>
                                <ul>
                                    <li>Salary Certificate Latest (With Joining date & Permanent Date)</li>
                                    <li>7 Month Bank statement (Salary A/C)</li>
                                    <li>NID Copy</li>
                                    <li>3 Copy Lab Print Photo (Lab Print).</li>
                                    <li>Employee ID/ Office ID / Visiting Card</li>
                                    <li>TIN Certificate (Above 5 Lac Loan)</li>
                                </ul>
                                <h3>Guarantor:</h3>
                                <ul>
                                    <li>NID Photo Copy</li>
                                    <li>2 Copy Lab Print Photo (Lab Print).</li>
                                    <li>NID Copy</li>
                                    <li>Employee ID/ Visiting Card</li>
                                </ul>
                                <h3>For Take over Loan:</h3>
                                <ul>
                                    <li>Loan Sanction Latter</li>
                                    <li>Outstanding Certificate</li>
                                    <li>Repayment Statement (Start to till date)</li>
                                </ul>
                            </div>
                            <div class="list__item mb-4">
                                <p> <strong class="bg__green">Documents for Business Person: </strong> </p>
                                <ul>
                                    <li>Application Form duly filled up and signed</li>
                                    <li>Recent Studio Photographs of Applicant & guarantor(s)</li>
                                    <li>Valid NID of Applicant and Guarantor(s) (National ID/Passport/Driving License)</li>
                                    <li>TIN Certificate along with IT10-B (if required)</li>
                                    <li>Bank statement of last 12 (Twelve) months</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="right__docs_info">
                            <div class="list__item mb-4">
                                {{-- <p> <strong class="bg__green">Documents for Salaried person: </strong> </p> --}}
                                <ul>
                                    <li>Copy of bill – Electricity / WASA / GAS/ Land Phone (If applicable)</li>
                                    <li>Trade License</li>
                                    <li>Income Statement & Asset-Liability Statement. </li>
                                </ul>
                            </div>
                            <div class="list__item mb-4">
                                <p> <strong class="bg__green">Documents for Landlord/Landlady</strong> </p>
                                <ul>
                                    <li>Application Form duly filled up and signed.</li>
                                    <li>Recent Studio Photographs of Applicant & guarantor(s)</li>
                                    <li>Valid NID of Applicant and Guarantor(s) (National ID / Passport / Driving License)</li>
                                    <li>E-TIN Copy.</li>
                                    <li>Bank statement of last 12 (Twelve) months.</li>
                                    <li>Copy of bill – Electricity / WASA / GAS/ Land Phone</li>
                                    <li>Title Deed copy.</li>
                                    <li>Rental Income Proof</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/.modal-body -->
          </div>
          <!--/.modal-content -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
@endsection