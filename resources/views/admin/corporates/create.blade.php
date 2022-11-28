@extends('admin.layouts.master')

@section('title', 'New Corporate Logo')
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
                    <h5 class="mb-0 text-primary">New Corporate Logo</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.corporates.store') }}" enctype="multipart/form-data" id="logoForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-12">
                        <label for="corporate_logo" class="form-label">Corporate Logo</label>
                        <input type="file" name="corporate_logo" id="corporate_logo" class="form-control" />
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
