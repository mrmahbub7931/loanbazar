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
                        {{-- <th>Type</th> --}}
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
                        {{-- <td>{{ $application->type }}</td> --}}
                        <td>@if(getVendorName($application->send_to_vendor) == null) <span class="btn btn-sm btn-warning radius-30 text-white">Not yet assign to any vendor</span>@endif{{ getVendorName($application->send_to_vendor) }}</td>
                        <td>{{ date('F d, Y / H:i:s', strtotime($application->created_at)) }}</td>
                        <td>{{ $application->phone }}</td>
                        @if($application->status === 'Eligible')
                            <td class="text-center">
                                <span class="btn btn-sm btn-success radius-30 text-white">
                                    Eligible
                                </span>
                            </td>
                        @elseif($application->status === 'Not Eligible')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Not Eligible
                                </span>
                            </td>
                        @elseif($application->status === 'Send to Bank')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Send to Bank
                                </span>
                            </td>
                        @elseif($application->status === 'Documents on Processes')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Documents on Processes
                                </span>
                            </td>
                        @elseif($application->status === 'Documents Pending')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    Documents Pending
                                </span>
                            </td>
                        @elseif($application->status === 'File Collect')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    File Collect
                                </span>
                            </td>
                        @elseif($application->status === 'File Submitted')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    File Submitted
                                </span>
                            </td>
                        @elseif($application->status === 'Send to Back Customers')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Send to Back Customers
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
                        @elseif($application->status === 'Contacted File')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Contacted File
                                </span>
                            </td>
                        @elseif($application->status === 'File Approved')
                            <td class="text-center">
                                <span class="btn btn-sm btn-success radius-30 text-white">
                                    File Approved
                                </span>
                            </td>
                        @elseif($application->status === 'File Disbursed')
                            <td class="text-center">
                                <span class="btn btn-sm btn-success radius-30 text-white">
                                    File Disbursed
                                </span>
                            </td>
                        @elseif($application->status === 'File Decline')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    File Decline
                                </span>
                            </td>
                        @elseif($application->status === 'CIB Bad')
                            <td class="text-center">
                                <span class="btn btn-sm btn-danger radius-30 text-white">
                                    CIB Bad
                                </span>
                            </td>
                        @elseif($application->status === 'Subspecies Client')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Subspecies Client
                                </span>
                            </td>
                        @elseif($application->status === 'Need to Re-Contact')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Need to Re-Contact
                                </span>
                            </td>
                        @elseif($application->status === 'Retailer Not Communicate')
                            <td class="text-center">
                                <span class="btn btn-sm btn-info radius-30 text-white">
                                    Retailer Not Communicate
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
                            <a href="{{ route('admin.application.edit', $application->id) }}" class="btn btn-sm btn-info text-white text-center"><i class='bx bx-edit-alt'></i></a>
                            <a onclick="deleteApplication({{$application->id}})" href="javascript:;" class="btn btn-sm btn-danger text-white  text-center"><i class='bx bxs-trash-alt' ></i></a>
                            <form action="{{ route('admin.application.destroy', $application->id) }}" method="post"
                                style="display: none" id="delete-form-{{$application->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        {{-- <th>Type</th> --}}
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
