@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3>Welcome {{ Auth::user()->name }}! <span class="text-warning"><?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $h = date('G');

                                    if($h>=5 && $h<=11)
                                    {
                                        echo "Good Morning";
                                    }
                                    else if($h>=12 && $h<=15)
                                    {
                                        echo "Good Afternoon";
                                    }
                                    else
                                    {
                                        echo "Good Evening";
                                    }
                                ?></span>  </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Applications</p>
                                <h4 class="my-1">{{totalApplicationForVendor(); }}</h4>
                                <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>10% Since last week</p>
                            </div>
                            <div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Loan Applications</p>
                                <h4 class="my-1">{{totalLoanApplicationForVendor()}}</h4>
                                <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week</p>
                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Card Applications</p>
                                <h4 class="my-1">{{totalCardApplicationForVendor()}}</h4>
                                <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p>
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
