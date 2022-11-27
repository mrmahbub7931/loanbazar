@extends('frontend.layouts.master')

@section('title',  'Exchange Rates')

@section('content')
    <section class="wrapper bg-soft-light lb__page__header visa__card">
        <div class="container py-12 py-md-12">
            <div class="row text-center">
                <div class="col-12">
                    <div class="content">
                        <h1 class="text-white fs-40">Exchange Rates</h1>
                        <ul class="lb__breadcrumb">
                            <li><a href="#"><i class="uil uil-home"></i> Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Exchange Rates</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper lb__services_card bg-soft-leaf pt-12">
        <div class="container">
            <div class="row">
                  <div class="col-12 col-md-6 offset-md-3">
                    {{-- {{ dd($echange_rates->currency) }} --}}
                    @php
                        $buyingArr = json_decode($exchange_rates->buying);
                        $sellingArr = json_decode($exchange_rates->selling);
                        
                        $i = 0;
                    @endphp
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Currency</th>
                            <th scope="col">Buying</th>
                            <th scope="col">Selling</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach (json_decode($exchange_rates->currency) as $item)
                        
                          <tr>
                            <td>{{$item}}</td>
                            <td>{{ $buyingArr[$i] }}</td>
                            <td>{{ $sellingArr[$i] }}</td>
                          </tr>
                          <input type="hidden" value="{{ $i++ }}">
                          @endforeach
                        </tbody>
                      </table>
                      <p class="d-block">Rate in BDT as on {{ $exchange_rates->date }}</p>
                  </div>
            </div>
        
        </div>    
    </section>
    
@endsection