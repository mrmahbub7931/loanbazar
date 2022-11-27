@extends('frontend.layouts.master')

@section('title',  'Emi Calculator')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/emi/mainf5ee.css?x79211') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/emi/commoncalculatorf5ee.css?x79211') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/emi/emicalculatorf5ee.css?x79211') }}">
@endpush

@section('content')
<section class="wrapper lb__services_card bg-soft-leaf pt-12">
<div class="wrap container" role=document>
    <div class="content row">
        <main class=main>
            <article class="post-7 page type-page status-publish hentry">
                
                <div class="calculatorcontainer" style="height: auto !important;">
                    <div class="emicalculatorcontainer" style="height: auto !important;">
                       <div id="loanformcontainer" class="row" style="height: auto !important;">
                          <div id="emicalculatordashboard" class="col-sm-12">
                             <ul class="loanproduct-nav">
                                <li id="home-loan" class=""><a href="#">Home Loan</a></li>
                                <li id="personal-loan" class=""><a href="#">Personal Loan</a></li>
                                <li id="car-loan" class="active"><a href="#">Car Loan</a></li>
                             </ul>
                             <div class="cleardiv"></div>
                             <div id="emicalculatorinnerformwrapper">
                                <form id="emicalculatorform" class="">
                                   <div class="form-horizontal" id="emicalculatorinnerform">
                                      <div class="row form-group lamount">
                                         <label class="col-lg-4 control-label" for="loanamount">Car Loan Amount</label>
                                         <div class="col-lg-6">
                                            <div class="input-group">
                                               <input class="form-control" id="loanamount" name="loanamount" value="25,00,000" type="text">
                                               <div class="input-group-append">
                                                  <span class="input-group-text">৳</span>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div id="loanamountslider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                         <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 25%;"></div>
                                         <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 25%;"></span>
                                      </div>
                                      <div id="loanamountsteps" class="steps"><span class="tick" style="left: 0%;">|<br><span class="marker">0</span></span><span class="tick" style="left: 25%;">|<br><span class="marker">5L</span></span><span class="tick" style="left: 50%;">|<br><span class="marker">10L</span></span><span class="tick" style="left: 75%;">|<br><span class="marker">15L</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">20L</span></span></div>
                                      <div class="sep row form-group lint">
                                         <label class="col-lg-4 control-label" for="loaninterest">Interest Rate</label>
                                         <div class="col-lg-6">
                                            <div class="input-group">
                                               <input class="form-control" id="loaninterest" name="loaninterest" value="10.5" type="text">
                                               <div class="input-group-append">
                                                  <span class="input-group-text">%</span>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div id="loaninterestslider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                         <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 16.6667%;"></div>
                                         <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 16.6667%;"></span>
                                      </div>
                                      <div id="loanintereststeps" class="steps"><span class="tick" style="left: 0%;">|<br><span class="marker">5</span></span><span class="tick" style="left: 16.67%;">|<br><span class="marker">7.5</span></span><span class="tick" style="left: 33.34%;">|<br><span class="marker">10</span></span><span class="tick" style="left: 50%;">|<br><span class="marker">12.5</span></span><span class="tick" style="left: 66.67%;">|<br><span class="marker">15</span></span><span class="tick" style="left: 83.34%;">|<br><span class="marker">17.5</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">20</span></span></div>
                                      <div class="sep row form-group lterm">
                                         <label class="col-lg-4 control-label" for="loanterm">Loan Tenure</label>
                                         <div class="col-lg-6">
                                            <div class="loantermwrapper">
                                               <div class="input-group">
                                                  <input class="form-control" id="loanterm" name="loanterm" value="20" type="text">
                                                  <div class="input-group-append tenure-choice" data-toggle="buttons">
                                                     <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-secondary active"> <input type="radio" name="loantenure" id="loanyears" value="loanyears" tabindex="4" autocomplete="off" checked="checked">Yr </label>
                                                        <label class="btn btn-secondary"> <input type="radio" name="loantenure" id="loanmonths" value="loanmonths" tabindex="5" autocomplete="off">Mo </label>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div id="loantermslider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                         <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 66.6667%;"></div>
                                         <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 66.6667%;"></span>
                                      </div>
                                      <div id="loantermsteps" class="steps"><span class="tick" style="left: 0%;">|<br><span class="marker">0</span></span><span class="tick" style="left: 14.29%;">|<br><span class="marker">1</span></span><span class="tick" style="left: 28.57%;">|<br><span class="marker">2</span></span><span class="tick" style="left: 42.86%;">|<br><span class="marker">3</span></span><span class="tick" style="left: 57.14%;">|<br><span class="marker">4</span></span><span class="tick" style="left: 71.43%;">|<br><span class="marker">5</span></span><span class="tick" style="left: 85.71%;">|<br><span class="marker">6</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">7</span></span></div>
                                      <div id="leschemewrapper" class="sep toggle-visible">
                                         <div class="sep row form-group escheme">
                                            <label class="col-lg-4 control-label" for="emischeme">EMI Scheme</label>
                                            <div class="col-lg-8">
                                               <div class="input-group emischemes">
                                                  <div class="btn-group btn-group-toggle add-check" data-toggle="buttons">
                                                     <label class="btn btn-secondary"> <input type="radio" name="emischeme" id="emiadvance" value="emiadvance" tabindex="4" autocomplete="off">EMI in Advance </label>
                                                     <label class="btn btn-secondary active"> <input type="radio" name="emischeme" id="emiarrears" value="emiarrears" tabindex="5" autocomplete="off" checked="checked">EMI in Arrears </label>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <input id="loanproduct" name="loanproduct" value="car-loan" type="hidden">
                                   <input id="loanstartdate" name="loanstartdate" value="Aug 2022" type="hidden">
                                   <input id="loanyearformat" name="loanyearformat" value="calendaryear" type="hidden">
                                   <input id="loandata" name="loandata" value="" type="hidden">
                                   <input id="calcversion" name="calcversion" value="4.0" type="hidden">
                                </form>
                                <div class="row gutter-left gutter-right">
                                   <div id="emipaymentsummary" class="col-sm-5 col-md-6 no-gutter-left no-gutter-right">
                                      <div id="emiamount">
                                         <h4>Loan EMI</h4>
                                         <p>৳<span>41,033</span></p>
                                      </div>
                                      <div id="emitotalinterest">
                                         <h4>Total Interest Payable</h4>
                                         <p>৳<span>4,61,984</span></p>
                                      </div>
                                      <div id="emitotalamount" class="column-last">
                                         <h4>Total Payment<br>(Principal + Interest)</h4>
                                         <p>৳<span>24,61,984</span></p>
                                      </div>
                                   </div>
                                   <div id="emipiechart" class="no-gutter-left no-gutter-right col-sm-7 col-md-6 highcharts-container" data-highcharts-chart="18" style="overflow: hidden;">
                                      <div id="highcharts-heh0q9w-330" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 341px; height: 294px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: bold; color: rgb(51, 51, 51);">
                                         <svg version="1.1" class="highcharts-root" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;color:#333333;fill:#333333;" xmlns="http://www.w3.org/2000/svg" width="341" height="294" viewBox="0 0 341 294">
                                            <desc>Created with Highcharts 8.1.0</desc>
                                            <defs>
                                               <clipPath id="highcharts-heh0q9w-333-">
                                                  <rect x="0" y="0" width="321" height="199" fill="none"></rect>
                                               </clipPath>
                                            </defs>
                                            <rect fill="transparent" class="highcharts-background" x="0" y="0" width="341" height="294" rx="0" ry="0"></rect>
                                            <rect fill="transparent" class="highcharts-plot-background" x="10" y="42" width="321" height="199"></rect>
                                            <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="10" y="42" width="321" height="199"></rect>
                                            <g class="highcharts-series-group" data-z-index="3">
                                               <g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,42) scale(1 1)" style="cursor:pointer;">
                                                  <path fill="#88A825" d="M 160.48177124826927 10.000001856354146 A 89.5 89.5 0 1 1 77.73450673077836 65.43941979498251 L 160.5 99.5 A 0 0 0 1 0 160.5 99.5 Z" transform="translate(0,0)" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-0"></path>
                                                  <path fill="#ED8C2B" d="M 77.76860868804981 65.35667134579623 A 89.5 89.5 0 0 1 160.37568629554258 10.000086334662399 L 160.5 99.5 A 0 0 0 0 0 160.5 99.5 Z" transform="translate(-6,-8)" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-point-select highcharts-color-1"></path>
                                               </g>
                                               <g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-pie-series" transform="translate(10,42) scale(1 1)"></g>
                                            </g>
                                            <text x="171" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;font:bold 14px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="24">
                                               <tspan>Break-up of Total Payment</tspan>
                                            </text>
                                            <text x="171" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#333333;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="41"></text>
                                            <text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="291"></text>
                                            <g data-z-index="6" class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-tracker" transform="translate(10,42) scale(1 1)" opacity="1" style="cursor:pointer;">
                                               <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" transform="translate(173,139)">
                                                  <text x="5" data-z-index="1" style="color:#FFFFFF;cursor:pointer;font-size:11px;font-weight:bold;fill:#FFFFFF;" y="16">
                                                     <tspan style="font-weight:bold">81.2%</tspan>
                                                  </text>
                                               </g>
                                               <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" transform="translate(107,40)">
                                                  <text x="5" data-z-index="1" style="color:#FFFFFF;cursor:pointer;font-size:11px;font-weight:bold;fill:#FFFFFF;" y="16">
                                                     <tspan style="font-weight:bold">18.8%</tspan>
                                                  </text>
                                               </g>
                                            </g>
                                            <g class="highcharts-legend" data-z-index="7" transform="translate(34,253)">
                                               <rect fill="none" class="highcharts-legend-box" rx="0" ry="0" stroke="#DDDDDD" stroke-width="1" x="0.5" y="0.5" width="272" height="25" visibility="visible"></rect>
                                               <g data-z-index="1">
                                                  <g>
                                                     <g class="highcharts-legend-item highcharts-pie-series highcharts-color-0" data-z-index="1" transform="translate(8,3)">
                                                        <text x="21" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" data-z-index="2" y="15">
                                                           <tspan>Principal Loan Amount</tspan>
                                                        </text>
                                                        <rect x="2" y="4" width="12" height="12" fill="#88A825" rx="6" ry="6" class="highcharts-point" data-z-index="3"></rect>
                                                     </g>
                                                     <g class="highcharts-legend-item highcharts-pie-series highcharts-color-1" data-z-index="1" transform="translate(171.39588928222656,3)">
                                                        <text x="21" y="15" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" data-z-index="2">
                                                           <tspan>Total Interest</tspan>
                                                        </text>
                                                        <rect x="2" y="4" width="12" height="12" fill="#ED8C2B" rx="6" ry="6" class="highcharts-point" data-z-index="3"></rect>
                                                     </g>
                                                  </g>
                                               </g>
                                            </g>
                                         </svg>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div id="emipaymentdetails">
                          <form class="gutter-left gutter-right form-horizontal">
                             <div class="row form-group" id="emipaymentscheduleheader">
                                <label class="col-md-4 col-lg-5 control-label" for="startmonthyear">Schedule showing EMI payments starting from</label>
                                <div class="col-md-4 col-lg-3">
                                   <div class="input-group">
                                      <input class="form-control" id="startmonthyear" name="startmonthyear" value="" type="text" readonly="readonly">
                                      <div class="input-group-append">
                                         <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-md-4 col-lg-3 form-group lyearformat">
                                   <select class="form-control" tabindex="15" name="yearformat" id="yearformat">
                                      <option value="calendaryear" selected="selected">Calendar Year wise</option>
                                      <option value="financialyear">Financial Year wise</option>
                                   </select>
                                </div>
                             </div>
                          </form>
                          <div id="emibarchart" class="hidden-ts highcharts-container" data-highcharts-chart="19" style="overflow: hidden;">
                             <div id="highcharts-heh0q9w-334" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 1042px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: bold; color: rgb(51, 51, 51);">
                                <svg version="1.1" class="highcharts-root" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;color:#333333;fill:#333333;" xmlns="http://www.w3.org/2000/svg" width="1042" height="400" viewBox="0 0 1042 400">
                                   <desc>Created with Highcharts 8.1.0</desc>
                                   <defs>
                                      <clipPath id="highcharts-heh0q9w-335-">
                                         <rect x="0" y="0" width="843" height="301" fill="none"></rect>
                                      </clipPath>
                                   </defs>
                                   <rect fill="transparent" class="highcharts-background" x="0" y="0" width="1042" height="400" rx="0" ry="0"></rect>
                                   <rect fill="transparent" class="highcharts-plot-background" x="103" y="10" width="843" height="301"></rect>
                                   <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 172.5 10 L 172.5 311" opacity="1"></path>
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 313.5 10 L 313.5 311" opacity="1"></path>
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 453.5 10 L 453.5 311" opacity="1"></path>
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 594.5 10 L 594.5 311" opacity="1"></path>
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 734.5 10 L 734.5 311" opacity="1"></path>
                                      <path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 875.5 10 L 875.5 311" opacity="1"></path>
                                   </g>
                                   <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 311.5 L 946 311.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 251.5 L 946 251.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 191.5 L 946 191.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 130.5 L 946 130.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 70.5 L 946 70.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 9.5 L 946 9.5" opacity="1"></path>
                                   </g>
                                   <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 311.5 L 946 311.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 251.5 L 946 251.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 191.5 L 946 191.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 130.5 L 946 130.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 70.5 L 946 70.5" opacity="1"></path>
                                      <path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 103 9.5 L 946 9.5" opacity="1"></path>
                                   </g>
                                   <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="1" x="102.5" y="9.5" width="844" height="302"></rect>
                                   <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                                      <path fill="none" class="highcharts-axis-line" stroke="#000" stroke-width="1" data-z-index="7" d="M 103 311.5 L 946 311.5"></path>
                                   </g>
                                   <g class="highcharts-axis highcharts-yaxis" data-z-index="2">
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 311.5 L 956 311.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 251.5 L 956 251.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 191.5 L 956 191.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 130.5 L 956 130.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 70.5 L 956 70.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 946 9.5 L 956 9.5" opacity="1"></path>
                                      <text x="1026.8777618408203" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(90 1026.8777618408203 160.5)" class="highcharts-axis-title" style="color:#333333;font-weight:bold;font-size:12px;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="160.5">
                                         <tspan>EMI Payment / year</tspan>
                                      </text>
                                      <path fill="none" class="highcharts-axis-line" stroke="#000" stroke-width="1" data-z-index="7" d="M 946.5 10 L 946.5 311"></path>
                                   </g>
                                   <g class="highcharts-axis highcharts-yaxis" data-z-index="2">
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 311.5 L 93 311.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 251.5 L 93 251.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 191.5 L 93 191.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 130.5 L 93 130.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 70.5 L 93 70.5" opacity="1"></path>
                                      <path fill="none" class="highcharts-tick" stroke="#000" stroke-width="1" d="M 103 9.5 L 93 9.5" opacity="1"></path>
                                      <text x="15.162246704101562" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 15.162246704101562 160.5)" class="highcharts-axis-title" style="color:#333333;font-weight:bold;font-size:12px;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="160.5">
                                         <tspan>Balance</tspan>
                                      </text>
                                      <path fill="none" class="highcharts-axis-line" stroke="#000" stroke-width="1" data-z-index="7" d="M 102.5 10 L 102.5 311"></path>
                                   </g>
                                   <g class="highcharts-series-group" data-z-index="3">
                                      <g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-tracker" transform="translate(103,10) scale(1 1)" clip-path="url(#highcharts-heh0q9w-335-)">
                                         <rect x="37" y="199" width="68" height="35" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                         <rect x="177" y="55" width="68" height="73" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                         <rect x="318" y="55" width="68" height="57" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                         <rect x="458" y="55" width="68" height="41" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                         <rect x="599" y="55" width="68" height="22" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                         <rect x="739" y="158" width="68" height="4" fill="#ED8C2B" opacity="1" class="highcharts-point"></rect>
                                      </g>
                                      <g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-column-series" transform="translate(103,10) scale(1 1)" clip-path="none"></g>
                                      <g data-z-index="0.1" class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-tracker" transform="translate(103,10) scale(1 1)" clip-path="url(#highcharts-heh0q9w-335-)">
                                         <rect x="37" y="234" width="68" height="68" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                         <rect x="177" y="128" width="68" height="174" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                         <rect x="318" y="112" width="68" height="190" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                         <rect x="458" y="96" width="68" height="206" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                         <rect x="599" y="77" width="68" height="225" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                         <rect x="739" y="162" width="68" height="140" fill="#88A825" opacity="1" class="highcharts-point"></rect>
                                      </g>
                                      <g data-z-index="0.1" class="highcharts-markers highcharts-series-1 highcharts-column-series" transform="translate(103,10) scale(1 1)" clip-path="none"></g>
                                      <g data-z-index="0.1" class="highcharts-series highcharts-series-2 highcharts-spline-series" transform="translate(103,10) scale(1 1)" clip-path="url(#highcharts-heh0q9w-335-)">
                                         <path fill="none" d="M 70.25 20.505405867394984 C 70.25 20.505405867394984 154.55 50.942691723463994 210.75 72.7742456606029 C 266.95 94.6057995977418 295.05 105.90191078640296 351.25 129.66317555308947 C 407.45 153.42444031977598 435.55 165.7190250094668 491.75 191.58056949403547 C 547.95 217.44211397860417 576.05 237.08701187473997 632.25 258.97089797593287 C 688.45 280.85478407712577 772.75 301 772.75 301" class="highcharts-graph" data-z-index="1" stroke="#B8204C" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                                         <path fill="none" d="M 70.25 20.505405867394984 C 70.25 20.505405867394984 154.55 50.942691723463994 210.75 72.7742456606029 C 266.95 94.6057995977418 295.05 105.90191078640296 351.25 129.66317555308947 C 407.45 153.42444031977598 435.55 165.7190250094668 491.75 191.58056949403547 C 547.95 217.44211397860417 576.05 237.08701187473997 632.25 258.97089797593287 C 688.45 280.85478407712577 772.75 301 772.75 301" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linecap="round" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22"></path>
                                      </g>
                                      <g data-z-index="0.1" class="highcharts-markers highcharts-series-2 highcharts-spline-series highcharts-tracker" transform="translate(103,10) scale(1 1)">
                                         <path fill="#B8204C" d="M 70 24.505405867394984 A 4 4 0 1 1 70.00399999933333 24.505403867395152 Z" opacity="1" class="highcharts-point"></path>
                                         <path fill="#B8204C" d="M 210 76.7742456606029 A 4 4 0 1 1 210.00399999933333 76.77424366060306 Z" opacity="1" class="highcharts-point"></path>
                                         <path fill="#B8204C" d="M 351 133.66317555308947 A 4 4 0 1 1 351.00399999933336 133.66317355308965 Z" opacity="1" class="highcharts-point"></path>
                                         <path fill="#B8204C" d="M 491 195.58056949403547 A 4 4 0 1 1 491.00399999933336 195.58056749403565 Z" opacity="1" class="highcharts-point"></path>
                                         <path fill="#B8204C" d="M 632 262.97089797593287 A 4 4 0 1 1 632.0039999993334 262.97089597593305 Z" opacity="1" class="highcharts-point"></path>
                                         <path fill="#B8204C" d="M 772 305 A 4 4 0 1 1 772.0039999993334 304.9999980000002 Z" opacity="1" class="highcharts-point"></path>
                                      </g>
                                   </g>
                                   <text x="521" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;font:bold 14px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="24"></text>
                                   <text x="521" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#333333;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" y="24"></text>
                                   <text x="0" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="397"></text>
                                   <g class="highcharts-legend" data-z-index="7" transform="translate(394,355)">
                                      <rect fill="#EEEEEE" class="highcharts-legend-box" rx="0" ry="0" stroke="#DDDDDD" stroke-width="1" x="0.5" y="0.5" width="252" height="29" visibility="visible"></rect>
                                      <g data-z-index="1">
                                         <g>
                                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-undefined highcharts-series-1" data-z-index="1" transform="translate(8,3)">
                                               <text x="21" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" data-z-index="2" y="17">
                                                  <tspan>Principal</tspan>
                                               </text>
                                               <rect x="2" y="6" width="12" height="12" fill="#88A825" rx="6" ry="6" class="highcharts-point" data-z-index="3"></rect>
                                            </g>
                                            <g class="highcharts-legend-item highcharts-column-series highcharts-color-undefined highcharts-series-0" data-z-index="1" transform="translate(96.78125,3)">
                                               <text x="21" y="17" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" data-z-index="2">
                                                  <tspan>Interest</tspan>
                                               </text>
                                               <rect x="2" y="6" width="12" height="12" fill="#ED8C2B" rx="6" ry="6" class="highcharts-point" data-z-index="3"></rect>
                                            </g>
                                            <g class="highcharts-legend-item highcharts-spline-series highcharts-color-undefined highcharts-series-2" data-z-index="1" transform="translate(180.9891815185547,3)">
                                               <path fill="none" d="M 0 13 L 16 13" class="highcharts-graph" stroke="#B8204C" stroke-width="2"></path>
                                               <path fill="#B8204C" d="M 8 17 A 4 4 0 1 1 8.003999999333336 16.99999800000017 Z" class="highcharts-point" opacity="1"></path>
                                               <text x="21" y="17" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" data-z-index="2">
                                                  <tspan>Balance</tspan>
                                               </text>
                                            </g>
                                         </g>
                                      </g>
                                   </g>
                                   <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7">
                                      <text x="175.84272486435069" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 175.84272486435069 327)" y="327" opacity="1">2022</text>
                                      <text x="316.34272486435066" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 316.34272486435066 327)" y="327" opacity="1">2023</text>
                                      <text x="456.84272486435066" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 456.84272486435066 327)" y="327" opacity="1">2024</text>
                                      <text x="597.3427248643507" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 597.3427248643507 327)" y="327" opacity="1">2025</text>
                                      <text x="737.8427248643507" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 737.8427248643507 327)" y="327" opacity="1">2026</text>
                                      <text x="878.3427248643507" style="color:#000;cursor:default;font-size:11px;font:normal 9px Verdana, sans-serif;fill:#000;" text-anchor="end" transform="translate(0,0) rotate(-45 878.3427248643507 327)" y="327" opacity="1">2027</text>
                                   </g>
                                   <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7">
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="315" opacity="1">
                                         <tspan>৳ 0</tspan>
                                      </text>
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="254" opacity="1">
                                         <tspan>৳ 1,20,000</tspan>
                                      </text>
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="194" opacity="1">
                                         <tspan>৳ 2,40,000</tspan>
                                      </text>
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="134" opacity="1">
                                         <tspan>৳ 3,60,000</tspan>
                                      </text>
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="74" opacity="1">
                                         <tspan>৳ 4,80,000</tspan>
                                      </text>
                                      <text x="961" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" transform="translate(0,0)" y="14" opacity="1">
                                         <tspan>৳ 6,00,000</tspan>
                                      </text>
                                   </g>
                                   <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7">
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="315" opacity="1">
                                         <tspan>৳ 0</tspan>
                                      </text>
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="254" opacity="1">
                                         <tspan>৳ 4,00,000</tspan>
                                      </text>
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="194" opacity="1">
                                         <tspan>৳ 8,00,000</tspan>
                                      </text>
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="134" opacity="1">
                                         <tspan>৳ 12,00,000</tspan>
                                      </text>
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="74" opacity="1">
                                         <tspan>৳ 16,00,000</tspan>
                                      </text>
                                      <text x="88" style="color:#333333;cursor:default;font-size:11px;font:12px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="end" transform="translate(0,0)" y="14" opacity="1">
                                         <tspan>৳ 20,00,000</tspan>
                                      </text>
                                   </g>
                                </svg>
                             </div>
                          </div>
                          <div id="emipaymenttable">
                             <table>
                                <tbody>
                                   <tr class="row no-margin">
                                      <th class="col-2 col-lg-1" id="yearheader">Year</th>
                                      <th class="col-sm-2 d-none d-sm-table-cell" id="principalheader">Principal<br>(A)</th>
                                      <th class="col-3 d-table-cell d-sm-none" id="principalheader">Principal</th>
                                      <th class="col-sm-2 d-none d-sm-table-cell" id="interestheader">Interest<br>(B)</th>
                                      <th class="col-3 d-table-cell d-sm-none" id="interestheader">Interest</th>
                                      <th class="col-sm-3 d-none d-sm-table-cell" id="totalheader">Total Payment<br>(A + B)</th>
                                      <th class="col-4 col-sm-3" id="balanceheader">Balance</th>
                                      <th class="col-lg-1 d-none d-lg-table-cell" id="paidtodateheader">Loan Paid To Date</th>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2022" class="col-2 col-lg-1 paymentyear toggle">2022</td>
                                      <td class="col-3 col-sm-2 currency">৳ 1,36,249</td>
                                      <td class="col-3 col-sm-2 currency">৳ 68,917</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 2,05,165</td>
                                      <td class="col-4 col-sm-3 currency">৳ 18,63,751</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">6.81%</td>
                                   </tr>
                                   <tr id="monthyear2022" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Aug</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 26,866</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 14,167</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 19,73,134</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">1.34%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Sep</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 27,057</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,976</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 19,46,077</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">2.70%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Oct</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 27,248</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,785</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 19,18,829</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">4.06%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Nov</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 27,441</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,592</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 18,91,387</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">5.43%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Dec</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 27,636</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,397</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 18,63,751</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">6.81%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2023" class="col-2 col-lg-1 paymentyear toggle">2023</td>
                                      <td class="col-3 col-sm-2 currency">৳ 3,47,301</td>
                                      <td class="col-3 col-sm-2 currency">৳ 1,45,095</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 4,92,397</td>
                                      <td class="col-4 col-sm-3 currency">৳ 15,16,450</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">24.18%</td>
                                   </tr>
                                   <tr id="monthyear2023" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jan</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 27,831</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,202</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 18,35,920</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">8.20%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Feb</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 28,029</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 13,004</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 18,07,891</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">9.61%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Mar</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 28,227</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 12,806</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 17,79,664</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">11.02%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Apr</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 28,427</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 12,606</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 17,51,237</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">12.44%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">May</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 28,628</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 12,405</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 17,22,609</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">13.87%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jun</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 28,831</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 12,202</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 16,93,777</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">15.31%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jul</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 29,035</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 11,998</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 16,64,742</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">16.76%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Aug</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 29,241</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 11,792</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 16,35,501</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">18.22%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Sep</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 29,448</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 11,585</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 16,06,052</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">19.70%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Oct</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 29,657</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 11,376</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 15,76,396</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">21.18%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Nov</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 29,867</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 11,166</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 15,46,529</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">22.67%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Dec</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 30,078</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 10,955</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 15,16,450</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">24.18%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2024" class="col-2 col-lg-1 paymentyear toggle">2024</td>
                                      <td class="col-3 col-sm-2 currency">৳ 3,78,000</td>
                                      <td class="col-3 col-sm-2 currency">৳ 1,14,397</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 4,92,397</td>
                                      <td class="col-4 col-sm-3 currency">৳ 11,38,451</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">43.08%</td>
                                   </tr>
                                   <tr id="monthyear2024" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jan</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 30,292</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 10,742</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 14,86,159</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">25.69%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Feb</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 30,506</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 10,527</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 14,55,653</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">27.22%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Mar</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 30,722</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 10,311</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 14,24,930</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">28.75%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Apr</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 30,940</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 10,093</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 13,93,991</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">30.30%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">May</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 31,159</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 9,874</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 13,62,832</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">31.86%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jun</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 31,380</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 9,653</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 13,31,452</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">33.43%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jul</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 31,602</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 9,431</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 12,99,850</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">35.01%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Aug</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 31,826</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 9,207</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 12,68,024</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">36.60%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Sep</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 32,051</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 8,982</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 12,35,973</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">38.20%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Oct</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 32,278</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 8,755</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 12,03,695</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">39.82%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Nov</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 32,507</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 8,526</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 11,71,188</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">41.44%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Dec</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 32,737</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 8,296</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 11,38,451</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">43.08%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2025" class="col-2 col-lg-1 paymentyear toggle">2025</td>
                                      <td class="col-3 col-sm-2 currency">৳ 4,11,411</td>
                                      <td class="col-3 col-sm-2 currency">৳ 80,985</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 4,92,397</td>
                                      <td class="col-4 col-sm-3 currency">৳ 7,27,039</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">63.65%</td>
                                   </tr>
                                   <tr id="monthyear2025" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jan</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 32,969</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 8,064</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 11,05,482</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">44.73%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Feb</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 33,203</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 7,830</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 10,72,279</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">46.39%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Mar</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 33,438</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 7,595</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 10,38,841</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">48.06%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Apr</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 33,675</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 7,358</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 10,05,167</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">49.74%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">May</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 33,913</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 7,120</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 9,71,254</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">51.44%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jun</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 34,153</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 6,880</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 9,37,100</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">53.14%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jul</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 34,395</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 6,638</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 9,02,705</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">54.86%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Aug</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 34,639</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 6,394</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 8,68,066</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">56.60%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Sep</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 34,884</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 6,149</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 8,33,182</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">58.34%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Oct</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 35,131</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 5,902</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 7,98,050</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">60.10%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Nov</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 35,380</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 5,653</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 7,62,670</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">61.87%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Dec</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 35,631</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 5,402</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 7,27,039</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">63.65%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2026" class="col-2 col-lg-1 paymentyear toggle">2026</td>
                                      <td class="col-3 col-sm-2 currency">৳ 4,47,776</td>
                                      <td class="col-3 col-sm-2 currency">৳ 44,620</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 4,92,397</td>
                                      <td class="col-4 col-sm-3 currency">৳ 2,79,263</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">86.04%</td>
                                   </tr>
                                   <tr id="monthyear2026" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jan</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 35,883</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 5,150</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 6,91,156</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">65.44%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Feb</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 36,137</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 4,896</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 6,55,019</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">67.25%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Mar</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 36,393</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 4,640</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 6,18,625</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">69.07%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Apr</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 36,651</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 4,382</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 5,81,974</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">70.90%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">May</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 36,911</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 4,122</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 5,45,064</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">72.75%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jun</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 37,172</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 3,861</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 5,07,891</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">74.61%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jul</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 37,435</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 3,598</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 4,70,456</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">76.48%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Aug</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 37,701</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 3,332</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 4,32,755</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">78.36%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Sep</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 37,968</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 3,065</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 3,94,788</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">80.26%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Oct</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 38,237</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 2,796</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 3,56,551</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">82.17%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Nov</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 38,507</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 2,526</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 3,18,043</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">84.10%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Dec</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 38,780</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 2,253</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 2,79,263</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">86.04%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                   <tr class="row no-margin yearlypaymentdetails">
                                      <td id="year2027" class="col-2 col-lg-1 paymentyear toggle">2027</td>
                                      <td class="col-3 col-sm-2 currency">৳ 2,79,263</td>
                                      <td class="col-3 col-sm-2 currency">৳ 7,968</td>
                                      <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 2,87,231</td>
                                      <td class="col-4 col-sm-3 currency">৳ 0</td>
                                      <td class="col-lg-1 d-none d-lg-table-cell paidtodateyear">100.00%</td>
                                   </tr>
                                   <tr id="monthyear2027" class="row no-margin monthlypaymentdetails">
                                      <td class="col-12 monthyearwrapper" colspan="6">
                                         <div class="monthlypaymentcontainer" style="display: none;">
                                            <table>
                                               <tbody>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jan</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 39,055</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 1,978</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 2,40,208</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">87.99%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Feb</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 39,332</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 1,701</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 2,00,877</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">89.96%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Mar</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 39,610</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 1,423</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 1,61,266</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">91.94%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Apr</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 39,891</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 1,142</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 1,21,376</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">93.93%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">May</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 40,173</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 860</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 81,202</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">95.94%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jun</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 40,458</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 575</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 40,744</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">97.96%</td>
                                                  </tr>
                                                  <tr class="row no-margin">
                                                     <td class="col-2 col-lg-1 paymentmonthyear">Jul</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 40,744</td>
                                                     <td class="col-3 col-sm-2 currency">৳ 289</td>
                                                     <td class="col-sm-3 d-none d-sm-table-cell currency">৳ 41,033</td>
                                                     <td class="col-4 col-sm-3 currency">৳ 0</td>
                                                     <td class="col-lg-1 d-none d-lg-table-cell paidtodatemonthyear">100.00%</td>
                                                  </tr>
                                               </tbody>
                                            </table>
                                         </div>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </div>
                          <div id="ecalprintandshare">
                             <p id="ecalprintandsharetext">Want to print (with all your numbers pre-filled)?</p>
                             <a title="Print this page" class="ecalprint btn btn__red btn-sm" href="#" role="button"><i class="fa fa-print"></i> Print</a>
                             
                             <div id="loader"><i class="fa fa-spinner fa-pulse"></i></div>
                          </div>
                       </div>
                    </div>
                 </div>

            </article>
        </main>
    </div>
</div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('/frontend/assets/js/emi/ui/core.minf5ee.js?x79211') }}"></script>
    <script src="{{ asset('/frontend/assets/js/emi/ui/mouse.minf5ee.js?x79211') }}"></script>
    <script src="{{ asset('/frontend/assets/js/emi/ui/slider.minf5ee.js?x79211') }}"></script>
    <script src="{{ asset('/frontend/assets/js/emi/commoncalculatorf5ee.js?x79211') }}"></script>
    <script src="{{ asset('/frontend/assets/js/emi/emicalculatorf5ee.js?x79211') }}"></script>
@endpush