@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'Roles')

@section('content')
<div class="card">
    
    <div class="ml-auto m-3">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-outline-success px-5 radius-30">New Role</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="rolesTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="width: 40%;">
                            @if ($role->permissions->count() > 0)
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->slug }}</span>
                            @endforeach
                            @else
                            <span class="badge bg-danger">No permissions</span>
                            @endif
                        </td>
                        <td>{{ $role->updated_at->diffForHumans() }}</td>
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                <a class="dropdown-item" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
								<a onclick="deleteroles({{$role->id}})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.roles.destroy',$role->id) }}" method="post"
                                    style="display: none" id="delete-form-{{$role->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
							</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function deletereviews(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This user data is safe :)',
                        'error'
                    )
                }
            })
        }
</script>
    <script>
        $(document).ready(function() {

			$('#rolesTable').DataTable();

		  } );
    </script>
@endpush