@extends('admin.layouts.master')

@section('title', 'Create Service')

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
                    <h5 class="mb-0 text-primary">Update Service</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.services.update',$service->id) }}" enctype="multipart/form-data" id="sliderForm" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <div class="col-md-12">
                        <label for="service_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="service_title" name="title" value="{{ $service->title }}">
                    </div> --}}

                    <div class="col-md-12">
                        <label for="service_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="service_title" name="title" value="{{ $service->title }}">
                    </div>
                    <div class="col-md-12">
                        <label for="short_desc" class="form-label">Short Description</label>
                        <input type="text" class="form-control" id="short_desc" name="short_desc" value="{{ $service->short_desc }}">
                    </div>
                    <div class="col-md-6">
                        <label for="btn_txt" class="form-label">Button text</label>
						<input type="text" class="form-control" id="btn_txt" name="btn_txt" value="{{ $service->btn_txt }}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="icon_image" class="form-label">Icon image</label>
                        <input class="form-control" type="file" id="icon_image" name="icon_image">
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/services/'.$service->icon_image) }}" alt="" width="48" height="48" class="my-3">
                    </div>
                    <div class="col-md-6">
                        <label for="body" class="form-label">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $service->url }}">
                    </div>
                    
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="deal_status" value="1" name="status" @if($service->status == '1') checked @endif>
                            <label class="form-check-label" for="deal_status">Status</label>
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
<script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
</script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
@endpush
