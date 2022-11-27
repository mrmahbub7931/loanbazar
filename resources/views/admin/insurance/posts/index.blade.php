@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'Cards Service')

@section('content')
<div class="card">
    
    <div class="ml-auto m-3">
        <a href="{{ route('admin.insurance.posts.create') }}" class="btn btn-sm btn-outline-success px-5 radius-30">Create insurance post service</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="applicationTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>published</th>
                        <th>Post Type</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insurancePosts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ date('F d, Y', strtotime($post->created_at)) }}</td>
                        <td>{{ $post->getInsurancePostParent->title; }}</td>
                        @if($post->status == '1')
                            <td class="text-center">
                                <span class="btn btn-sm btn-success radius-30 text-white">
                                    Approved
                                </span>
                            </td>
                        @else
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Pending
                                </span>
                            </td>

                        @endif
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
                                <a class="dropdown-item" href="{{ route('admin.insurance.posts.edit', $post->id) }}">Edit</a>
								<a onclick="deleteInsurancePost({{ $post->id }})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.insurance.posts.destroy', $post->id) }}" method="post"
                                    style="display: none" id="delete-form-{{ $post->id }}">
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
                        <th>Title</th>
                        <th>published</th>
                        <th>Post Type</th>
                        <th>status</th>
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
    function deleteInsurancePost(id) {
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