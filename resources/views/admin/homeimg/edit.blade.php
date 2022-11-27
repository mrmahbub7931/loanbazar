@extends('admin.layouts.master')

@section('title', 'Update Image')
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
                    <h5 class="mb-0 text-primary">update Image</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.homeimg.update',$image->id) }}" enctype="multipart/form-data" id="homeimgForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="image_title" class="form-label">Image title</label>
                        <input type="text" class="form-control" id="image_title" name="image_title" value="{{ $image->image_title }}">
                    </div>
                    <div class="col-12">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" />
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/homeimg/'.$image->image) }}" alt="" class="mt-3" width="500" height="300" />
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
