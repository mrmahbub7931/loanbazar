@extends('admin.layouts.master')

@section('title', 'New Circular')

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
                    <h5 class="mb-0 text-primary">New Circular</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.circular.store') }}" enctype="multipart/form-data" id="circularForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="job_title" class="form-label">Job title</label>
                        <input type="text" class="form-control" id="job_title" name="job_title">
                    </div>
                    <div class="col-md-12">
                        <label for="job_location" class="form-label">Job location</label>
                        <input type="text" class="form-control" id="job_location" name="job_location">
                    </div>
                    <div class="col-md-12">
                        <label for="job_description" class="form-label">Job description</label>
						<textarea name="job_description" id="mytextarea" cols="30" rows="20"></textarea>
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
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
@endpush
