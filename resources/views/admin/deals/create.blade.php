@extends('admin.layouts.master')

@section('title', 'Create Deals')

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
                    <h5 class="mb-0 text-primary">Create Deals</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.deals.store') }}" enctype="multipart/form-data" id="sliderForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="sliderTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="sliderTitle" name="title">
                        
                    </div>
                    <div class="col-md-12">
                        <label for="body" class="form-label">Body</label>
                        <button type="button" class="btn btn-sm btn-outline-info" id="dealsMoreBtn"><i class="bx bx-plus"></i></button>
                        <div class="dynamic_field">
                            <input type="text" name="body[]" class="form-control" id="body">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="deal_image" class="form-label">Deal image</label>
						<input class="form-control" type="file" id="deal_image" name="deal_image">
                    </div>
                    <div class="col-md-6">
                        <label for="btn_url" class="form-label">Button Url</label>
                        <input type="text" class="form-control" id="btn_url" name="btn_url">
                    </div>
                    <div class="col-md-6">
                        <label for="btn_txt" class="form-label">Button text</label>
						<input type="text" class="form-control" id="btn_txt" name="btn_txt">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="deal_status" value="1" name="status">
                            <label class="form-check-label" for="deal_status">Status</label>
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
    <script>
        
        $(document).ready(function(){

            var i = 1;
            
            $('#dealsMoreBtn').on('click', function(e){
                e.preventDefault();
                i++;
                $('.dynamic_field').append('<div class="my-3 d-flex inner_field" id="inner_field_'+i+'"><input type="text" name="body[]" class="form-control" id="body-'+i+'"><button type="button" name="remove" id="'+i+'" class="mx-2 btn btn-danger btn_remove">X</button></div>');
                
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
