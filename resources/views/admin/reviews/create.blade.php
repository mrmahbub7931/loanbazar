@extends('admin.layouts.master')

@section('title', 'New Review')
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
                    <h5 class="mb-0 text-primary">New Review</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.reviews.store') }}" enctype="multipart/form-data" id="reviewForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-12">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name">
                    </div>
                    <div class="col-md-12">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="col-md-12">
                        <label for="body" class="form-label">Body</label>
						<textarea name="body" id="mytextarea" cols="30" rows="20"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-info px-5">Save</button>
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
