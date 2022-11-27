@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'New Writer')

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
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
                <h5 class="mb-0 text-primary">Edit Writer : "{{ $writer->writer_name }}"</h5>
            </div>
            <hr>
            <form class="row g-3" action="{{ route('admin.writers.update',$writer->id) }}" id="writerForm" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label for="writer_name" class="form-label">Writer name</label>
                    <input class="form-control" type="text" id="writer_name" name="writer_name" value="{{ $writer->writer_name }}">
                </div>
                <div class="col-md-12">
                    <label for="writer_bio" class="form-label">Writer Bio</label>
                    <textarea name="writer_bio" id="mytextarea" cols="30" rows="10">{!! $writer->writer_bio !!}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="writer_image" class="form-label">Writer Image</label>
                    <input class="form-control" type="file" id="writer_image" name="writer_image">
                    <img src="{{ Storage::disk('public')->url('frontend/assets/img/writers/'.$writer->writer_image) }}" alt="" class="mt-3" width="150px" height="150px">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-info px-5 text-white">Submit</button>
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

