@extends('admin.layouts.master')

@section('title', 'Create Faq')

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
                    <h5 class="mb-0 text-primary">Create Loan Faq</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.loans.faqs.store') }}" id="applicationForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="faq_title" class="form-label">Faq Title</label>
						<input class="form-control" type="text" id="faq_title" name="faq_title">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="faq_description" class="form-label">Faq Description</label>
						<textarea name="faq_description" id="faq_description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label my-3" for="status">Select Service</label>
                        <select name="loan_service_id" id="loan_service_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($loans as $item)
                            <option value="{{ $item->id }}">{{ $item->service_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label my-3" for="status">Status</label>
                        <select name="status" id="status" class="form-control @error( 'status' ) is-invalid @enderror">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
    
@endpush
