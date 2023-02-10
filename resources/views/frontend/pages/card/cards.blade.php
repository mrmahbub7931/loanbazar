@extends('frontend.layouts.master')
@php
    $title = $card ? $card->service_title : 'Empty Card';
@endphp
@section('title',  $title)

@section('content')
    @if ($card)
        
    <section class="wrapper bg-soft-light lb__page__header visa__card" style="background-image: url({{ Storage::disk('public')->url('frontend/assets/img/cards/'.$card->header_image) }})">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">{{ $card->service_title }}</h1>
                        <p class="text-white">{!! strip_tags($card->title_description) !!}</p>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">{{ $card->service_title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper lb__services_card bg-soft-leaf pt-12">
        <div class="container">
            <div class="row">
                {{-- {{ dd($cardDoc) }} --}}
                <div class="col-12">
                    @php
                        $i = 0;
                    @endphp
                    
                        
                    
                    @foreach ($cardRows as $serviceRow)
                    @if ($serviceRow->status == '1')
                    <div class="item-service mb-3">
                        
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-2 p-0 pr-15">
                                <div class="left-content">
                                    <img src="{{ Storage::disk('public')->url('frontend/assets/img/cards/'.$serviceRow->card_image) }}" alt="">
                                    <a href="javascript:;" class="cmp__btn service__btn__outline" data-item="{{ $serviceRow->id }}" data-type="cards">Add Compare</a>
                                    <a href="{{ route('front.gapply') }}" class="apl__btn service__btn bg-green">Apply Now</a>
                                </div>
                            </div>
                            <div class="col-md-8 p-0 pl-15 pr-15 bl-dotted br-dotted">
                                <div class="middle-content">
                                    <div class="top_notice">
                                        <p>{{ $serviceRow->notify_top }}</p>
                                    </div>
                                    <div class="bank_name text-center">
                                        <h3 class="row_service_title">{{ $serviceRow->bank_name }}</h3>
                                    </div>
                                    <div class="middle_items">
                                        <div class="row align-items-center">
                                            <div class="col br-dotted">
                                                
                                                <div class="details">
                                                    <p class="title"> <strong>Interest Free Period</strong> </p>
                                                    <p class="info">{{ $serviceRow->interest_period }}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Annual Fee</strong> </p>
                                                    <p class="info">{{ $serviceRow->annual_fee }}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Card Cheque Processing</strong> </p>
                                                    <p class="info">{{ $serviceRow->card_processing }}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Free Supplementary Card</strong> </p>
                                                    <p class="info">{{ $serviceRow->free_supplementary_card }}</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="details">
                                                    <p class="title"> <strong>Withdrawal Limit</strong> </p>
                                                    <p class="info">{{ $serviceRow->withdrawl_limit }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom_notice">
                                            <p> <i class="uil uil-arrow-right"></i>{{ $serviceRow->notify_bottom }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center p-0 pl-15">
                                <div class="btn btn-circle icon btn btn-circle disabled mb-4">
                                    <i class="uil uil-file-search-alt fs-40 color__green"></i>
                                </div>
                                <a href="javascript:;" class="r__btn service__btn bg-green" data-bs-toggle="modal" data-bs-target="#required__docs">Required Documents</a>
                                <a href="javascript:;" class="q__btn plan__btn" data-bs-toggle="collapse" data-bs-target="#quick__details_{{++$i}}" aria-expanded="true" aria-controls="quick__details_{{$i}}">Quick Details <i class="uil uil-expand-arrows-alt"></i> </a>
                            </div>
                        </div>
                        <div id="quick__details_{{$i}}" class="collapse" aria-labelledby="quick__details_{{$i}}" data-bs-target="#quick__details-{{$i}}" style="">
                            <div class="row quick__details__row">
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Fees & Charges</strong> </p>
                                        <ul>
                                        @foreach(json_decode($serviceRow->fees_charges) as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                        </ul>    
                                    </div>    
                                </div>    
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Features</strong> </p>
                                        <ul>
                                            @foreach(json_decode($serviceRow->features) as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>    
                                    </div> 
                                </div>    
                                <div class="col">
                                    <div class="quick__details_col">
                                        <p> <strong>Eligibility</strong> </p>
                                        <ul>
                                            @foreach(json_decode($serviceRow->eligibility) as $item)
                                                <li>{!! $item !!}</li>
                                            @endforeach
                                        </ul>    
                                    </div>     
                                </div>    
                            </div> 
                        </div>
                    </div>
                    @endif
                    @endforeach
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
                            <p class="disclaimer__box"> <strong>Disclaimer: </strong> {{ $card->disclaimer }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($cardFaq)
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
            <div class="col-lg-12 mb-0">
              <div id="accordion-1" class="accordion-wrapper card__accordion">
                {!! html_entity_decode($cardFaq->faq_description) !!}
                
                {{-- <div class="card">
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
              </div> --}}
              <!-- /.accordion-wrapper -->
            </div>
            <!--/column -->

          </div>
          <!--/.row -->
        </div>
        <!-- /.container -->
      </section>   
    @endif  {{-- cardFaq end  --}}
      <!-- /section -->
      @else
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>No data found!</h3>
                    </div>
                </div>
            </div>
        </section> 
      @endif
      <div class="modal fade" id="required__docs" tabindex="-1">
        <div class="modal-dialog required__docs modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-body">
              <div class="header">
                  <h3>Required Documents</h3>
                  <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="row mt-4">
                    @if ($cardDoc && $cardDoc->status == "1")
                        {!! html_entity_decode($cardDoc->body) !!}
                    @else
                    <p>No required data</p>
                    @endif
                    
                </div>
            <!--/.modal-body -->
          </div>
          <!--/.modal-content -->
        </div>
        <!--/.modal-dialog -->
      </div>
      <!--/.modal -->
@endsection