@extends('admin.layouts.master')

@push('css')

@endpush

@section('title', 'Application')

@section('content')
<div class="card">

    <div class="ml-auto m-3">
        {{-- <a href="{{ route('admin.deals.create') }}" class="btn btn-sm btn-outline-success px-5 radius-30">Create Deals</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="applicationTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Vendor</th>
                        <th>Apply Date</th>
                        <th>Phone</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $key => $application)


                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $application->full_name }}</td>
                        <td>{{ $application->type }}</td>
                        <td>{{ getVendorName($application->send_to_vendor) }}</td>
                        <td>{{ date('F d, Y', strtotime($application->created_at)) }}</td>
                        <td>{{ $application->phone }}</td>
                        @if($application->status === 'Disbursed')
                            <td class="text-center">
                                <span class="btn btn-sm btn-success radius-30 text-white">
                                    Disbursed
                                </span>
                            </td>
                        @elseif($application->status === 'Not Eligible')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Not Eligible
                                </span>
                            </td>
                        @elseif($application->status === 'Documents Pending')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Documents Pending
                                </span>
                            </td>
                        @elseif($application->status === 'Not Interested')
                            <td class="text-center">
                                <span class="btn btn-sm btn-warning radius-30 text-white">
                                    Not Interested
                                </span>
                            </td>
                        @elseif($application->status === 'Not Response')
                            <td class="text-center">
                                <span class="btn btn-sm btn-warning radius-30 text-white">
                                    Not Response
                                </span>
                            </td>
                        @elseif($application->status === 'Contacted')
                            <td class="text-center">
                                <span class="btn btn-sm btn-warning radius-30 text-white">
                                    Contacted
                                </span>
                            </td>
                        @elseif($application->status === 'Decline')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Decline
                                </span>
                            </td>
                        @else
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    New
                                </span>
                            </td>

                        @endif
                        <td>
							<button type="button" class="btn btn-info text-white btn-sm" data-bs-toggle="dropdown">	<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="{{ route('admin.application.edit', $application->id) }}">Edit</a>
								<a onclick="deleteApplication({{$application->id}})" class="dropdown-item" href="javascript:;">Delete</a>
                                <form action="{{ route('admin.application.destroy', $application->id) }}" method="post"
                                    style="display: none" id="delete-form-{{$application->id}}">
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
                        <th>Type</th>
                        <th>Vendor</th>
                        <th>Apply Date</th>
                        <th>Phone</th>
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
    function deleteApplication(id) {
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
