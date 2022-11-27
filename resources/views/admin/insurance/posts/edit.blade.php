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
                    <h5 class="mb-0 text-primary">Update Insurance post Item</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.insurance.posts.update', $insurancePost->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
						<input class="form-control" type="text" id="title" name="title" value="{{ $insurancePost->title }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
						<textarea name="description" id="mytextarea" cols="30" rows="10">{{ $insurancePost->description }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="insurance_id" class="form-label">Select Insurance</label>
                        <select name="insurance_id" id="insurance_id" class="form-control">
                            <option value="">Select Value</option>
                            @foreach ($insurances as $insurance)
                                <option value="{{ $insurance->id }}" {{ $insurancePost->insurance_id == $insurance->id ? 'selected' : '' }}>{{ $insurance->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="pdf_file" class="form-label">PDF File</label>
						<input class="form-control" type="file" id="pdf_file" name="pdf_file">
                    </div>

                    <div class="col-md-12">
                        <label for="featured_image" class="form-label">Featured Image</label>
						<input class="form-control" type="file" id="featured_image" name="featured_image">
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-check-label my-3" for="card_status">Status</label>
                            <select name="status" id="card_status" class="form-control @error( 'status' ) is-invalid @enderror">
                                {{-- {{$card->status == '1' ? 'selected' : ''}} --}}
                                <option value="1" {{$insurancePost->status == '1' ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$insurancePost->status == '0' ? 'selected' : ''}}>Inactive</option>
                            </select>
                           
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
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
    
@endpush
