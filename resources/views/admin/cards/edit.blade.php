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
                    <h5 class="mb-0 text-primary">Update Deals</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.cards.update', $card->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="service_title" class="form-label">Card Title</label>
						<input class="form-control" type="text" id="service_title" name="service_title" value="{{ $card->service_title }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="title_description" class="form-label">Header Description</label>
						<textarea name="title_description" id="mytextarea" cols="30" rows="10">{{ $card->title_description }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="header_image" class="form-label">Header Image</label>
						<input class="form-control" type="file" id="header_image" name="header_image">
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/cards/'.$card->header_image) }}" alt="" width="150" height="80" class="my-2">
                    </div>

                    <div class="col-md-12">
                        <label for="disclaimer" class="form-label">Disclaimer</label>
						<textarea name="disclaimer" id="disclaimer" cols="30" rows="10">{{ $card->disclaimer }}</textarea>
                    </div>
                    {{-- row service area start --}}
                   
                    <div class="col-md-12">
                        
                        <button type="button" class="btn btn-sm btn-outline-info mb-3" id="cardsMoreBtn"><i class="bx bx-plus"></i>Add Row</button>
                        <div class="row_service">
                        @if (count($cardsRows) > 0)
                        @php
                            $r = 0;
                        @endphp
                        @foreach ($cardsRows as $row)
                        <input type="hidden" name="service[{{$r}}][service_row_id]" value="{{$row->id}}" />
                        
                        <div class="row_service_inner" id="inner_row_s_{{$r}}">
                            <button type="button" name="remove" id="{{$r}}" class="mx-2 btn btn-danger btn_row_remove">X</button>
                            <div class="form-group mb-3"><label for="card_image">Card Image</label><input type="file" class="form-control" id="card_image" name="service[{{$r}}][card_image]" /><img class="p_card" src="{{ Storage::disk('public')->url('frontend/assets/img/cards/'.$row->card_image) }}" alt="" width="140" height="80" class="my-2"></div>
                            <div class="form-group mb-3"><label for="notify_top">Notify Top</label><input type="text" class="form-control" id="notify_top" name="service[{{$r}}][notify_top]" value="{{ $row->notify_top }}" /></div>
                            <div class="form-group mb-3"><label for="bank_name">Bank name</label><input type="text" class="form-control" id="bank_name" name="service[{{$r}}][bank_name]" value="{{ $row->bank_name }}"></div>
                            <div class="form-group mb-3"><label for="notify_bottom">Notify Bottom</label><input type="text" class="form-control" id="notify_bottom" name="service[{{$r}}][notify_bottom]" value="{{ $row->notify_bottom }}" /></div>
                            <div class="form-group mb-3"><label for="interest_period">Interest Period</label><input type="text" name="service[{{$r}}][interest_period]" id="interest_period" class="form-control" value="{{ $row->interest_period }}" /></div>
                            <div class="form-group mb-3"><label for="annual_fee">Annual Fee</label><input type="text" name="service[{{$r}}][annual_fee]" id="annual_fee" class="form-control" value="{{ $row->annual_fee }}" /></div>
                            <div class="form-group mb-3"><label for="card_processing">Card Processing</label><input type="text" name="service[{{$r}}][card_processing]" id="card_processing" class="form-control" value="{{ $row->card_processing }}" /></div>
                            <div class="form-group mb-3"><label for="free_supplementary_card">Free Supplementary Card</label><input type="text" name="service[{{$r}}][free_supplementary_card]" id="free_supplementary_card" class="form-control" value="{{ $row->free_supplementary_card }}" /></div>
                            <div class="form-group mb-3"><label for="withdrawl_limit">Withdrawl Limit</label><input type="text" name="service[{{$r}}][withdrawl_limit]" id="withdrawl_limit" class="form-control" value="{{ $row->withdrawl_limit }}" /></div>
                            <div class="fees_charges_wrap" id="fees_charges_{{$r}}">
                                <button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddFeesBtn" id="cardsAddFeesBtn-{{$r}}"><i class="bx bx-plus"></i>Add Fees and Charges</button>
                                <div><label for="fees_charges" class="form-label">Fees and Charges</label></div>
                                @foreach (json_decode($row['fees_charges']) as $item)
                                <div class="form-group mb-3 dynamic_fees">
                                        <div class="input-group d-flex mb-3">
                                            <input type="text" name="service[{{$r}}][fees_charges][]" id="fees_charges" class="form-control" value="{{$item}}" /><button type="button" name="remove" class="mx-2 btn btn-danger btn_fees_remove">X</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr />
                            <hr />
                            <div class="eligibility_wrap">
                                <button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddeligibilityBtn" id=""><i class="bx bx-plus"></i>Add Eligibility</button>
                                <div><label for="eligibility" class="form-label">Eligibility</label></div>
                                @foreach (json_decode($row['eligibility']) as $item)
                                <div class="form-group mb-3 dynamic_eligibility">
                                    <div class="input-group d-flex mb-3"><input type="text" name="service[{{$r}}][eligibility][]" id="eligibility" class="form-control" value="{{$item}}" /><button type="button" name="remove" class="mx-2 btn btn-danger btn_el_remove">X</button></div>
                                </div>
                                @endforeach
                            </div>
                            <hr />
                            <hr />
                            <div class="features_wrap">
                                <button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddfeaturesBtn" id=""><i class="bx bx-plus"></i>Add Features</button>
                                <div><label for="features" class="form-label">Features</label></div>
                                @foreach (json_decode($row['features']) as $item)
                                <div class="form-group mb-3 dynamic_features">
                                    <div class="input-group d-flex mb-3"><input type="text" name="service[{{$r}}][features][]" id="features" class="form-control" value="{{$item}}" /><button type="button" name="remove" class="mx-2 btn btn-danger btn_fea_remove">X</button></div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-check-label my-3" for="row_status">Status</label>
                                <select name="service[{{$r}}][status]" id="row_status" class="form-control @error( 'status' ) is-invalid @enderror">
                                    {{-- {{$card->status == '1' ? 'selected' : ''}} --}}
                                    <option value="1" {{$row->status == '1' ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$row->status == '0' ? 'selected' : ''}}>Inactive</option>
                                </select>
                               
                            </div>
                        </div>
                        @php
                            $r++
                        @endphp
                        @endforeach
                        @endif
                    </div> 
                    {{-- end row service --}}
                    </div>
                    {{-- row service area end --}}
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-check-label my-3" for="card_status">Status</label>
                            <select name="status" id="card_status" class="form-control @error( 'status' ) is-invalid @enderror">
                                {{-- {{$card->status == '1' ? 'selected' : ''}} --}}
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                           
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5"  >Publish</button>
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
    // function cardReadURL(input) {
    //     console.log(input.attr('name'));
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('.p_card')
    //                 .attr('src', e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
        
        $(document).ready(function(){
            console.clear();
            var rowCount = $('.row_service_inner').length >= 1 ? $('.row_service_inner').length : 0;

            // console.log('row',rowCount);
            // var r = 0;
            
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
                
               $('.row_service').append('<div class="row_service_inner" id="inner_row_s_'+rowCount+'"> <button type="button" name="remove" id="'+rowCount+'" class="mx-2 btn btn-danger btn_row_remove">X</button> <div class="form-group mb-3"><label for="card_image">Card Image</label><input type="file" class="form-control" id="card_image" name="service['+rowCount+'][card_image]"></div><div class="form-group mb-3"><label for="notify_top">Notify Top</label><input type="text" class="form-control" id="notify_top" name="service['+rowCount+'][notify_top]"></div><div class="form-group mb-3"><label for="notify_bottom">Notify Bottom</label><input type="text" class="form-control" id="notify_bottom" name="service['+rowCount+'][notify_bottom]"></div><div class="form-group mb-3"><label for="bank_name">Bank name</label><input type="text" class="form-control" id="bank_name" name="service['+rowCount+'][bank_name]"></div><div class="form-group mb-3"><label for="interest_period">Interest Period</label><input type="text" name="service['+rowCount+'][interest_period]" id="interest_period" class="form-control"></div><div class="form-group mb-3"><label for="annual_fee">Annual Fee</label><input type="text" name="service['+rowCount+'][annual_fee]" id="annual_fee" class="form-control"></div><div class="form-group mb-3"><label for="card_processing">Card Processing</label><input type="text" name="service['+rowCount+'][card_processing]" id="card_processing" class="form-control"></div><div class="form-group mb-3"><label for="free_supplementary_card">Free Supplementary Card</label><input type="text" name="service['+rowCount+'][free_supplementary_card]" id="free_supplementary_card" class="form-control"></div><div class="form-group mb-3"><label for="withdrawl_limit">Withdrawl Limit</label><input type="text" name="service['+rowCount+'][withdrawl_limit]" id="withdrawl_limit" class="form-control"></div><div class="form-group mb-3"><label class="form-check-label my-3" for="row_status">Status</label><select name="service['+rowCount+'][status]" id="row_status" class="form-control @error( "status" ) is-invalid @enderror"><option value="1">Active</option><option value="0">Inactive</option></select></div><div class="fees_charges_wrap" id="fees_charges_'+rowCount+'"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddFeesBtn" id="cardsAddFeesBtn-'+rowCount+'"><i class="bx bx-plus"></i>Add Fees and Charges</button> <div><label for="fees_charges" class="form-label">Fees and Charges</label></div><div class="form-group mb-3 dynamic_fees"> <div class="input-group d-flex mb-3"><input type="text" name="service['+rowCount+'][fees_charges][]" id="fees_charges" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_fees_remove">X</button></div></div></div><hr> <hr> <div class="eligibility_wrap"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddeligibilityBtn" id=""><i class="bx bx-plus"></i>Add Eligibility</button> <div><label for="eligibility" class="form-label">Eligibility</label></div><div class="form-group mb-3 dynamic_eligibility"> <div class="input-group d-flex mb-3"><input type="text" name="service['+rowCount+'][eligibility][]" id="eligibility" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_el_remove">X</button></div></div></div><hr> <hr> <div class="features_wrap"><button type="button" class="btn btn-sm btn-outline-info mb-3 cardsAddfeaturesBtn" id=""><i class="bx bx-plus"></i>Add Features</button> <div><label for="features" class="form-label">Features</label></div><div class="form-group mb-3 dynamic_features"> <div class="input-group d-flex mb-3"><input type="text" name="service['+rowCount+'][features][]" id="features" class="form-control"><button type="button" name="remove" class="mx-2 btn btn-danger btn_fea_remove">X</button></div></div></div></div>');
               rowCount++;
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
