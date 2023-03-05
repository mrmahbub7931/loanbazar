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
                        <h5 class="mb-0 text-black">{{ isset($user) ? 'Edit' : 'Create New' }} User</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form id="userFrom" role="form" method="POST"
                        action="{{ isset($user) ? route('admin.users.update',$user->id) : route('admin.users.store') }}">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? ''  }}">
                            </div>
                            @error('name')
                                <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                </p>
                            @enderror
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email ?? ''  }}">
                            </div>
                            @error('email')
                                <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                </p>
                            @enderror
                            <div class="form-group mb-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? ''  }}">
                            </div>
                            @error('phone')
                                <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                </p>
                            @enderror
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            @error('password')
                                <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                </p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-4">
                                <label class="form-label">Select Role</label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{isset($user) ? ($role->slug == $user->role->slug ? 'selected' : '') : ''}}>{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('role_id')
                                <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                </p>
                            @enderror
                            <button type="button" class="btn btn-danger" onClick="resetForm('userFrom')">
                                <i class="bx bx-redo"></i>
                                <span>Reset</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                @isset($user)
                                    <i class="bx bx-plus-circle"></i>
                                    <span>Update</span>
                                @else
                                    <i class="bx bx-plus-circle"></i>
                                    <span>Create</span>
                                @endisset
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">

    function resetForm(formId) {
        document.getElementById(formId).reset();
    }
</script>
@endpush
