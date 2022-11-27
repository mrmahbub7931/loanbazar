@extends('admin.layouts.master')

@section('title', 'Loan Service')

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
                    <h5 class="mb-0 text-primary">Create Loan Service Required Docs</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.loans.docs.store') }}" id="serviceDocsForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="service_title" class="form-label">Documents Title</label>
						<input class="form-control" type="text" id="service_title" name="service_title">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="serviceDocs" class="form-label">Service Docs</label>
						<textarea name="service_docs" id="serviceDocs" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-md-6 col-12">
                        <select name="loan_service_id" id="loan_service_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($loans as $item)
                            <option value="{{ $item->id }}">{{ $item->service_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="docs_status" value="1" name="status">
                            <label class="form-check-label" for="docs_status">Status</label>
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
    
@endpush
