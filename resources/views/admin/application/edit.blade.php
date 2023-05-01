@extends('admin.layouts.master')

@section('title', 'Update Application')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}" type="text/css"/>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">

        <div class="card border-top border-0 border-4 border-primary">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bx-outline me-1 me-1 font-22 text-primary"></i>
                    </div>
                    <h5 class="mb-0 text-black">{{ $application->type == 'card' ? 'Credit Card' : 'Loan' }} Application From {{ $application->full_name }} </h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.application.update', $application->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    @method('PUT')
                <table class="table table-bordered">
                    <tbody>
                        @isset($application->full_name)
                            <tr>
                                <td>Full Name</td>
                                <td>{{ $application->full_name }}</td>
                            </tr>
                        @endisset
                        @isset($application->phone)
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $application->phone }}</td>
                            </tr>
                        @endisset
                        @isset($application->email)
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $application->email }}</td>
                            </tr>
                        @endisset
                        @isset($application->date_of_birth)
                            <tr>
                                <td>DOB</td>
                                <td>{{ $application->date_of_birth }}</td>
                            </tr>
                        @endisset
                        @isset($application->present_address)
                            <tr>
                                <td>Present Address</td>
                                <td>{{ $application->present_address }}</td>
                            </tr>
                        @endisset
                        @isset($application->type)
                            <tr>
                                <td>Application Type</td>
                                <td>{{ $application->type == 'card' ? 'Credit Card' : 'Loan' }}</td>
                            </tr>
                        @endisset
                        @isset($application->profession)
                            <tr>
                                <td>Profession</td>
                                <td>{!! str_replace('_',' ',ucwords($application->profession)) !!}</td>
                            </tr>
                        @endisset
                        @isset($application->company_name)
                            <tr>
                                <td>Company Name</td>
                                <td>{{ $application->company_name }}</td>
                            </tr>
                        @endisset
                        @isset($application->designation)
                            <tr>
                                <td>Designation</td>
                                <td>{{ $application->designation }}</td>
                            </tr>
                        @endisset
                        @isset($application->monthly_salary)
                            <tr>
                                <td>Monthly Salary</td>
                                <td>{{ $application->monthly_salary }}</td>
                            </tr>
                        @endisset
                        @isset($application->salary_paid_by)
                            <tr>
                                <td>Salary Paid By</td>
                                <td>{{ $application->salary_paid_by }}</td>
                            </tr>
                        @endisset
                        @isset($application->business_name)
                            <tr>
                                <td>Business Name</td>
                                <td>{{ $application->business_name }}</td>
                            </tr>
                        @endisset
                        @isset($application->business_type)
                            <tr>
                                <td>Business Type</td>
                                <td>{{ $application->business_type }}</td>
                            </tr>
                        @endisset
                        @isset($application->business_monthly_income)
                            <tr>
                                <td>Monthly income or Bank Txn</td>
                                <td>{{ $application->business_monthly_income }}</td>
                            </tr>
                        @endisset
                        @isset($application->house_type)
                            <tr>
                                <td>House Type</td>
                                <td>{{ $application->house_type }}</td>
                            </tr>
                        @endisset
                        @isset($application->existing_lc)
                            <tr>
                                <td>Existing Loan or Credit Card</td>
                                <td>{{ $application->existing_lc }}</td>
                            </tr>
                        @endisset
                        @isset($application->existing_etin)
                            <tr>
                                <td>Existing E -TIN</td>
                                <td>{{ $application->existing_etin }}</td>
                            </tr>
                        @endisset
                        @isset($application->tracking_id)
                            <tr>
                                <td>Tracking ID</td>
                                <td>{{ $application->tracking_id }}</td>
                            </tr>
                        @endisset
                        @isset($application->user_note)
                            <tr>
                                <td>Client message / Special note!</td>
                                <td>{{ $application->user_note }}</td>
                            </tr>
                        @endisset
                        <tr>
                            <td>Author message / Any Special note!</td>
                            <td><input type="text" class="form-control" id="author_note" placeholder="Enter your special note" name="author_note" value="{{ $application->author_note }}"></td>
                        </tr>
                        <tr>
                            <td>Vendor message / Any Special note!</td>
                            <td><input type="text" class="form-control" id="vendor_note" placeholder="Enter your special note" name="vendor_note" value="{{ $application->vendor_note }}" @role('super-admin') readonly @endrole></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="Eligible" {{$application->status == 'Eligible' ? 'selected' : ''}}>Eligible</option>
                                    <option value="Not Eligible" {{$application->status == 'Not Eligible' ? 'selected' : ''}}>Not Eligible</option>
                                    <option value="Send to Bank" {{$application->status == 'Send to Bank' ? 'selected' : ''}}>Send to Bank</option>
                                    <option value="Documents on Processes" {{$application->status == 'Documents on Processes' ? 'selected' : ''}}>Documents on Processes</option>
                                    <option value="Documents Pending" {{$application->status == 'Documents Pending' ? 'selected' : ''}}>Documents Pending</option>
                                    <option value="File Collect" {{$application->status == 'File Collect' ? 'selected' : ''}}>File Collect</option>
                                    <option value="File Submitted" {{$application->status == 'File Submitted' ? 'selected' : ''}}>File Submitted</option>
                                    <option value="Send to Back Customers" {{$application->status == 'Send to Back Customers' ? 'selected' : ''}}>Send to Back Customers</option>
                                    <option value="Not Interested" {{$application->status == 'Not Interested' ? 'selected' : ''}}>Not Interested</option>
                                    <option value="Not Response" {{$application->status == 'Not Response' ? 'selected' : ''}}>Not Response</option>
                                    <option value="Contacted File" {{$application->status == 'Contacted File' ? 'selected' : ''}}>Contacted File</option>
                                    <option value="File Approved" {{$application->status == 'File Approved' ? 'selected' : ''}}>File Approved</option>
                                    <option value="File Disbursed" {{$application->status == 'File Disbursed' ? 'selected' : ''}}>File Disbursed</option>
                                    <option value="File Decline" {{$application->status == 'File Decline' ? 'selected' : ''}}>File Decline</option>
                                    <option value="CIB Bad" {{$application->status == 'CIB Bad' ? 'selected' : ''}}>CIB Bad</option>
                                    <option value="Subspecies Client" {{$application->status == 'Subspecies Client' ? 'selected' : ''}}>Subspecies Client</option>
                                    <option value="Need to Re-Contact " {{$application->status == 'Need to Re-Contact ' ? 'selected' : ''}}>Need to Re-Contact </option>
                                    <option value="Retailer Not Communicate" {{$application->status == 'Retailer Not Communicate' ? 'selected' : ''}}>Retailer Not Communicate</option>
                                </select>
                            </td>
                        </tr>
                        @role('super-admin')
                        <tr>
                            <td>Send to vendor</td>
                            <td>
                                <select class="form-control" name="send_to_vendor" id="send_to_vendor">
                                    <option value="">Select Vendor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->id}}" {{$vendor->id == $application->send_to_vendor ? 'selected' : ''}}>{{$vendor->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endrole
                    </tbody>
                  </table>
                  {{-- end form --}}

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
@endpush
