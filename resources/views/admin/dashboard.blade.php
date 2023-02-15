@extends('admin.layouts.master')

@section('title', 'Dashboard')
    
@section('content')
    <div>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Applications</p>
                                <h4 class="my-1">$4805</h4>
                                <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>$34 Since last week</p>
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
                                <h4 class="my-1">8.4K</h4>
                                <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week</p>
                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-group'></i>
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
                                <h4 class="my-1">59K</h4>
                                <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p>
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
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