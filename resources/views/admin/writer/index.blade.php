@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'Writers')

@section('content')
<div class="card">
    
    <div class="ml-auto m-3">
        <a href="{{ route('admin.writers.create') }}" class="btn btn-sm btn-info px-5 text-white">New writer</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="writerTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Wrtier name</th>
                        <th>Registration date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($writers as $key => $writer)
                    
                    
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $writer->writer_name }}</td>
                        <td>{{ date('F d, Y', strtotime($writer->created_at)) }}</td>
                       
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                <a class="dropdown-item" href="{{ route('admin.writers.edit',$writer->id) }}">Edit</a>
								<a onclick="deleteWriters({{$writer->id}})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.writers.delete',$writer->id) }}" method="post"
                                    style="display: none" id="delete-form-{{$writer->id}}">
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
                        <th>Wrtier name</th>
                        <th>Registration date</th>
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
    function deleteWriters(id) {
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
			$('#writerTable').DataTable();
		  } );
    </script>
@endpush