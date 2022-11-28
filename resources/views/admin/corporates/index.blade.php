@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'Home images')

@section('content')
<div class="card">
    
    <div class="ml-auto m-3">
        <a href="{{ route('admin.corporates.create') }}" class="btn btn-sm btn-outline-success px-5 radius-30">New Corporate Partners</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="reviewsTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ $homeimages }} --}}
                    @foreach ($corporates as $key => $corporate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $corporate->name }}</td>
                        <td>{{ getUsername($corporate->user_id) }}</td>
                        <td>{{ date('F d, Y', strtotime($corporate->created_at)) }}</td>
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                <a class="dropdown-item" href="{{ route('admin.corporates.edit',$corporate->id) }}">Edit</a>
								<a onclick="deleteCorporatePartners({{$corporate->id}})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.corporates.delete',$corporate->id) }}" method="post"
                                    style="display: none" id="delete-form-{{$corporate->id}}">
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
                        <th>Author</th>
                        <th>Published</th>
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
    function deleteCorporatePartners(id) {
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
			$('#reviewsTable').DataTable();
		  } );
    </script>
@endpush