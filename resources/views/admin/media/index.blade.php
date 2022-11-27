@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'All media')

@section('content')
<div class="card">
    
    <div class="ml-auto m-3">
        <a href="{{ route('admin.media.create') }}" class="btn btn-sm btn-outline-success px-5 radius-30">Upload</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="applicationTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Preview</th>
                        <th>published</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medias as $key => $media)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ Storage::disk('public')->url('frontend/assets/img/media/'.$media->file) }}" alt="" width="100" height="80" class="my-2"></td>
                        <td>{{ date('F d, Y', strtotime($media->created_at)) }}</td>
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
								<a onclick="deleteMedia({{ $media->id }})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.media.delete', $media->id) }}" method="post"
                                    style="display: none" id="delete-form-{{ $media->id }}">
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
                        <tr>
                            <th>#</th>
                            <th>Preview</th>
                            <th>published</th>
                            <th>Action</th>
                        </tr>
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
    function deleteMedia(id) {
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
			$('#applicationTable').DataTable();
		  } );
    </script>
@endpush