@extends('admin.layouts.master')

@section('title', 'Slider')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
       
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
                    <h5 class="mb-0 text-primary">Create Slider</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data" id="sliderForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="sliderTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="sliderTitle" name="title">
                        
                    </div>
                    <div class="col-md-12">
                        <h6 class="mb-2">Description</h6>
                        <textarea id="mytextarea" name="description">Hello, World!</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="slider_image" class="form-label">Slider image</label>
						<input class="form-control" type="file" id="slider_image" name="slider_image">
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
                            <input class="form-check-input" type="checkbox" id="slider_status" value="1" name="status">
                            <label class="form-check-label" for="slider_status">Status</label>
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
