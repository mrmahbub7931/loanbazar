@extends('admin.layouts.master')

@section('title', 'Update Application')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}" type="text/css"/>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
       
        <div class="card border-top border-0 border-4 border-primary">
            @if ($errors->any())
            <div class="alert alert-danger">
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
                    <h5 class="mb-0 text-primary">Create Loan Service</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.loans.store') }}" enctype="multipart/form-data" id="LoanServiceForm" method="post">
                    @csrf
                    
                    <div class="col-md-12">
                        <label for="service_title" class="form-label">Loan Title</label>
						<input class="form-control" type="text" id="service_title" name="service_title">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="title_description" class="form-label">Header Description</label>
						<textarea name="title_description" id="mytextarea" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="header_image" class="form-label">Header Image</label>
						<input class="form-control" type="file" id="header_image" name="header_image">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="disclaimer" class="form-label">Disclaimer</label>
						<textarea name="disclaimer" id="disclaimer" cols="30" rows="10"></textarea>
                    </div>

                    {{-- row service area start --}}
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-outline-info mb-3" id="cardsMoreBtn"><i class="bx bx-plus"></i>Add Row</button>
                        <div class="row_service"></div>

                    </div>
                    {{-- row service area end --}}
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="card_status" value="1" name="status">
                            <label class="form-check-label" for="card_status">Status</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
    <script>
        
        $(document).ready(function(){

            var r = 0;
            
            $(document).on('click','.cardsAddFeesBtn', function(e){
                e.preventDefault();
                var clossetWrap = $(this).closest('.fees_charges_wrap');
                var siblingInput = clossetWrap.find('.dynamic_fees').html();
                clossetWrap.append(siblingInput);
                console.log(siblingInput);
            });
            // remove fees section
            $(document).on('click','.btn_fees_remove', function(e){
                e.preventDefault();
                $(this).closest('.input-group').remove();
            });

            // add features
            $(document).on('click','.cardsAddfeaturesBtn', function(e){
                e.preventDefault();
                var featuresWrap = $(this).closest('.features_wrap');
                var siblingInput = featuresWrap.find('.dynamic_features').html();
                featuresWrap.append(siblingInput);
            });
            // remove fees section
            $(document).on('click','.btn_fea_remove', function(e){
                e.preventDefault();
                $(this).closest('.input-group').remove();
            });

            // add Elegibility
            $(document).on('click','.cardsAddeligibilityBtn', function(e){
                e.preventDefault();
                var eligibilityWrap = $(this).closest('.eligibility_wrap');
                var siblingInput = eligibilityWrap.find('.dynamic_eligibility').html();
                eligibilityWrap.append(siblingInput);
            });
            // remove fees section
            $(document).on('click','.btn_el_remove', function(e){
                e.preventDefault();
                $(this).closest('.input-group').remove();
            });


            // add row
            $(document).on('click','#cardsMoreBtn', function(e){
                e.preventDefault();  
                
               $('.row_service').append('<div class="row_service_inner" id="inner_row_s_'+r+'"> <button type="button" name="remove" id="'+r+'" class="mx-2 btn btn-danger btn_row_remove">X</button><div class="form-group mb-3"><label for="bank_logo">Bank Logo</label><input type="file" class="form-control" id="bank_logo" name="service['+r+'][bank_logo]"></div><div class="form-group mb-3"><label for="notify_top">Notify Top</label><input type="text" class="form-control" id="notify_top" name="service['+r+'][notify_top]"></div><div class="form-group mb-3"><label for="bank_name">Bank name</label><input type="text" class="form-control" id="bank_name" name="service['+r+'][bank_name]"></div><div class="form-group mb-3"><label for="notify_bottom">Notify Bottom</label><input type="text" class="form-control" id="notify_bottom" name="service['+r+'][notify_bottom]"></div><div class="fees_charges_wrap" id="fees_charges_'+r+'"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddFeesBtn" id="cardsAddFeesBtn-'+r+'"><i class="bx bx-plus"></i>Add Fees and Charges</button><div><label for="fees_charges" class="form-label">Fees and Charges</label></div><div class="form-group mb-3 dynamic_fees"><div class="input-group d-flex mb-3"><input type="text" name="service['+r+'][fees_charges][]" id="fees_charges" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_fees_remove">X</button></div></div></div><hr><hr><div class="eligibility_wrap"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddeligibilityBtn" id=""><i class="bx bx-plus"></i>Add Eligibility</button><div><label for="eligibility" class="form-label">Eligibility</label></div><div class="form-group mb-3 dynamic_eligibility"><div class="input-group d-flex mb-3"><input type="text" name="service['+r+'][eligibility][]" id="eligibility" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_el_remove">X</button></div></div></div><hr><hr><div class="features_wrap"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddfeaturesBtn" id=""><i class="bx bx-plus"></i>Add Features</button><div><label for="features" class="form-label">Features</label></div><div class="form-group mb-3 dynamic_features"><div class="input-group d-flex mb-3"><input type="text" name="service['+r+'][features][]" id="features" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_fea_remove">X</button></div></div></div><div class="form-group mb-3"><label for="ineterest_rate_range">Interest Rate Range</label><input type="text" name="service['+r+'][ineterest_rate_range]" id="ineterest_rate_range" class="form-control"></div><div class="form-group mb-3"><label for="processing_fee">Processing Fee</label><input type="text" name="service['+r+'][processing_fee]" id="processing_fee" class="form-control"></div><div class="form-group mb-3"><label for="loan_amount">Loan Amount</label><input type="text" name="service['+r+'][loan_amount]" id="loan_amount" class="form-control"></div><div class="form-group mb-3"><label for="loan_tenure">Loan Tenure</label><input type="text" name="service['+r+'][loan_tenure]" id="loan_tenure" class="form-control"></div><div class="form-group mb-3"><label class="form-check-label my-3" for="row_status">Status</label><select name="service['+r+'][status]" id="row_status" class="form-control @error( "status" ) is-invalid @enderror"><option value="1">Active</option><option value="0">Inactive</option></select></div></div>');
               r++;
            });

            $(document).on('click','.btn_row_remove', function(e){
                e.preventDefault();
                var row_id = $(this).attr('id');
                console.log(row_id);
                $('#inner_row_s_'+row_id+'').remove();
            });


        });
    </script>
@endpush
