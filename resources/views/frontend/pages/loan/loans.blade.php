@extends('frontend.layouts.master')

@php
    $title = $loan->service_title;
@endphp
@section('title',  $title)

@section('content')
    <section class="wrapper bg-soft-light lb__page__header" style="background-image: url({{ Storage::disk('public')->url('frontend/assets/img/loans/'.$loan->header_image) }})">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">{{ $loan->service_title }}</h1>
                        <p class="text-white">{!! $loan->title_description !!}</p>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">{{ $loan->service_title }}</li>
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
                    @php
                        $i = 0;
                    @endphp
                    
                        
                    
                    @foreach ($loanRows as $serviceRow)
                    @if ($serviceRow->status == '1')
                    <div class="item-service mb-5">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-2 p-0 pr-15">
                                <div class="left-content">
                                    <img src="{{ Storage::disk('public')->url('frontend/assets/img/loans/'.$serviceRow->bank_logo) }}" alt="">
                                    <a href="javascript:;" data-item="{{ $serviceRow->id }}" data-type="loans" class="cmp__btn service__btn__outline">Add Compare</a>
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
                                                    <p class="title"> <strong>Interest Rate Range</strong> </p>
                                                    <p class="info">{{ $serviceRow->ineterest_rate_range }}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Processing Fee</strong> </p>
                                                    <p class="info">{{$serviceRow->processing_fee}}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Loan Amount</strong> </p>
                                                    <p class="info">{{$serviceRow->loan_amount}}</p>
                                                </div>
                                            </div>
                                            <div class="col br-dotted">
                                                <div class="details">
                                                    <p class="title"> <strong>Loan Tenure</strong> </p>
                                                    <p class="info">{{$serviceRow->loan_tenure}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bottom_notice">
                                        <p> <i class="uil uil-arrow-right"></i> {{$serviceRow->notify_bottom}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center p-0 pl-15">
                                <div class="btn btn-circle icon btn btn-circle disabled mb-4">
                                    <i class="uil uil-file-search-alt fs-40 color__green"></i>
                                </div>
                                <a href="javascript:;" class="r__btn service__btn bg-green" data-bs-toggle="modal" data-bs-target="#required__docs">Required Documents</a>
                                <a href="javascript:;" class="q__btn plan__btn" data-bs-toggle="collapse" data-bs-target="#quick__details__{{++$i}}" aria-expanded="true" aria-controls="quick__details__{{$i}}">Quick Details <i class="uil uil-expand-arrows-alt"></i> </a>
                            </div>
                        </div>
                        <div id="quick__details__{{$i}}" class="collapse" aria-labelledby="quick__details__{{$i}}" data-bs-target="#quick__details-_{{$i}}" style="">
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
                            <p class="disclaimer__box"> <strong>Disclaimer: </strong> {{$loan->disclaimer}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($loanFaq)
        
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
                {!! html_entity_decode($loanFaq->faq_description) !!}
              </div>
              <!-- /.accordion-wrapper -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!-- /.container -->
      </section>
      @endif
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
                    
                    @if ($loanDoc && $loanDoc->status == "1")
                    {!! html_entity_decode($loanDoc->body) !!}
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