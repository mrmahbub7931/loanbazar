@extends('admin.layouts.master')

@section('title', 'Create Card Service')

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
                    <h5 class="mb-0 text-primary">Add Media</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" id="mediaUploadForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="file" class="form-label">Media</label>
						<input class="form-control" type="file" id="file" name="file">
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
