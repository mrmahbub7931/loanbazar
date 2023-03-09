@extends('admin.layouts.master')

@push('css')

@endpush

@section('title', 'Profile')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Profile</div>
    <div class="ps-3">
        <nav class="breadcrumb mb-0 p-0">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="col-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update',$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="name" class="form-label">Full name: </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email ?? ''  }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="phone" class="form-label">Phone</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? ''  }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-plus-circle"></i>
                    <span>Update</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
