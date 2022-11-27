@extends('admin.layouts.master')

@section('title', 'Update Exchange Rate')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
       
        <div class="card border-top border-0 border-4 border-primary">
            @if ($errors->any())
            <div class="alert alert-danger print-success-msg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bx-outline me-1 me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-primary">New Exchange Rate</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.exchange_rate.update',$exchange_rate->id) }}" id="exchangeRateForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ $exchange_rate->date }}">
                    </div>
                    <div class="col-md-12">
                        
                        <button type="button" class="btn btn-sm btn-outline-info" id="erMoreBtn"><i class="bx bx-plus"></i></button>
                        <div class="dynamic_field">
                                @php
                                    $buyingArr = json_decode($exchange_rate->buying);
                                    $sellingArr = json_decode($exchange_rate->selling);
                                    
                                    $i = 0;
                                @endphp
                                
                                @foreach (json_decode($exchange_rate->currency) as $item)
                                    
                                    <div class="my-3 d-flex inner_field" id="inner_field_{{ $i }}">
                                        {{-- {{ dd($buyingArr[$i]) }} --}}
                                        <label for="currency" class="form-label">Currency</label>
                                        <input type="text" name="currency[]" class="form-control mb-2" id="currency-{{ $i }}" value="{{ $item }}">
                                        <label for="buying" class="form-label">Buying</label>
                                        <input type="text" name="buying[]" class="form-control mb-2" id="buying-{{ $i }}" value="{{ $buyingArr[$i] }}">
                                        <label for="selling" class="form-label">Selling</label>
                                        <input type="text" name="selling[]" class="form-control mb-2" id="selling-{{ $i }}" value="{{ $sellingArr[$i] }}">
                                        
                                        <button type="button" name="remove" id="{{ $i }}" class="mx-2 btn btn-danger btn_remove">X</button>

                                    </div>
                                    <input type="hidden" value="{{ $i++ }}">
                                @endforeach
                        </div>

                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

$('#erMoreBtn').on('click', function(e){
    e.preventDefault();
    var i = $('.inner_field').length;
    $('.dynamic_field').append('<div class="my-3 d-flex inner_field" id="inner_field_'+i+'"><label for="currency-'+i+'" class="form-label">Currency</label><input type="text" name="currency[]" class="form-control mb-2" id="currency-'+i+'"><label for="buying-'+i+'" class="form-label">Buying</label><input type="text" name="buying[]" class="form-control mb-2" id="buying-'+i+'"><label for="selling'+i+'" class="form-label">Selling</label><input type="text" name="selling[]" class="form-control mb-2" id="selling-'+i+'"><button type="button" name="remove" id="'+i+'" class="mx-2 btn btn-danger btn_remove">X</button></div>');
    
});

$(document).on('click','.btn_remove', function(e){
    e.preventDefault();
    var btn_id = $(this).attr('id');
    console.log(btn_id);
    $('#inner_field_'+btn_id+'').remove();
});
});
    </script>
@endpush
