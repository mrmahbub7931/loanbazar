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
                    <form id="roleFrom" role="form" method="POST"
                        action="{{ isset($role) ? route('admin.roles.update',$role->id) : route('admin.roles.store') }}">
                        @csrf
                        @isset($role)
                            @method('PUT')
                        @endisset

                        <div class="form-group">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name ?? ''  }}">
                        </div>
                        @error('name')
                            <p class="p-2">
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            </p>
                            @enderror
                        <div class="form-row mt-4">
                            <div class="col text-center"><h3>Role Management Permission</h3></div>
                            @error('permissions')
                            <p class="p-2">
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </p>
                            @enderror
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                    <label class="custom-control-label" for="select-all">Select All</label>
                                </div>
                            </div>
                            @forelse ($modules->chunk(2) as $key => $chunks)
                                <div class="row">
                                    @foreach ($chunks as $module)
                                        <div class="col">
                                            <h5>Module: {{ $module->name }} </h5>
                                            @foreach($module->permissions as $key=>$permission)
                                            <div class="mb-3 ml-4">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="permission-{{ $permission->id }}"
                                                           value="{{ $permission->id }}"
                                                           name="permissions[]"
                                                    @if(isset($role))
                                                        @foreach($role->permissions as $rPermission)
                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                        @endforeach
                                                    @endif
                                                    >
                                                    <label class="custom-control-label"
                                                           for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <div class="row">
                                    <div class="col text-center">
                                        <strong>No Module Found.</strong>
                                    </div>
                                </div>
                            @endforelse
                            <button type="button" class="btn btn-danger" onClick="resetForm('roleFrom')">
                                <i class="fas fa-redo"></i>
                                <span>Reset</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                @isset($role)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    <span>Update</span>
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Create</span>
                                @endisset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });

    function resetForm(formId) {
        document.getElementById(formId).reset();
    }
</script>
@endpush
