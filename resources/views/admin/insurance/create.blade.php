@extends('admin.layouts.master')

@section('title', 'Create Insurance Service')

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
                    <h5 class="mb-0 text-primary">Create Insurance Item</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.insurance.store') }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    
                    <div class="col-md-12">
                        <label for="title" class="form-label">Insurance Title</label>
						<input class="form-control" type="text" id="title" name="title">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="description" class="form-label">Header Description</label>
						<textarea name="description" id="mytextarea" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="header_image" class="form-label">Header Image</label>
						<input class="form-control" type="file" id="header_image" name="header_image">
                    </div>
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
    
@endpush
