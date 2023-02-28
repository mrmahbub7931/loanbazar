@extends('admin.layouts.master')

@push('css')

@endpush

@section('title', 'Create Role')

@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-header">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-outline me-1 me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-black">{{ isset($role) ? 'Edit' : 'Create New' }} Role</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('admin.roles.update',$role->id) : route('admin.roles.create') }}" method="POST">
                        @csrf
                        @isset($role)
                            @method('PUT')
                        @endisset

                        <div class="form-group">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-row mt-4">
                            <div class="col text-center"><h3>Role Management Permission</h3></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
