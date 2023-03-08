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
                    <h5 class="mb-0 text-primary">Update Form</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.application.update', $application->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4 col-12">
                        <label for="full_name" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $application->full_name }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $application->phone }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $application->email }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="date_of_birth" class="form-label">Date of Birth </label>
                        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $application->date_of_birth }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="profession" class="form-label">Profession </label>
                        <input type="text" class="form-control" id="profession" name="profession" value="{{ $application->profession }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="present_address" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="present_address" name="present_address" value="{{ $application->present_address }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="tracking_id" class="form-label">Tracking ID</label>
                        <input type="text" class="form-control" id="tracking_id" name="tracking_id" value="{{ $application->tracking_id }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="type" class="form-label">Application Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $application->type == 'card' ? 'Credit Card' : 'Loan' }}" readonly>
                    </div>
                    @if ($application->card_name !== null)
                        <div class="col-md-4 col-12">
                            <label for="card_name" class="form-label">Card Name</label>
                            <input type="text" class="form-control" id="card_name" name="card_name" value="{{ $application->card_name }}" readonly>
                        </div>
                    @endif
                    @if ($application->loan_name !== null)
                        <div class="col-md-4 col-12">
                            <label for="loan_name" class="form-label">Loan Name</label>
                            <input type="text" class="form-control" id="loan_name" name="loan_name" value="{{ $application->loan_name }}" readonly>
                        </div>
                    @endif
                    <div class="col-md-4 col-12">
                        <label for="existing_lc" class="form-label">Existing Loan</label>
                        <input type="text" class="form-control" id="existing_lc" name="existing_lc" value="{{ $application->existing_lc ? "Yes" : "No" }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="existing_etin" class="form-label">Existing E-TIN</label>
                        <input type="text" class="form-control" id="existing_etin" name="existing_etin" value="{{ $application->existing_etin ? "Yes" : "No" }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $application->company_name }}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{ $application->designation}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="monthly_salary" class="form-label">Monthly Salary</label>
                        <input type="text" class="form-control" id="monthly_salary" name="monthly_salary" value="{{ $application->monthly_salary}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="salary_paid_by" class="form-label">Salary Paid By:</label>
                        <input type="text" class="form-control" id="salary_paid_by" name="salary_paid_by" value="{{ $application->salary_paid_by}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="business_name" class="form-label">Business Name:</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{ $application->business_name}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="business_type" class="form-label">Business Type:</label>
                        <input type="text" class="form-control" id="business_type" name="business_type" value="{{ $application->business_type}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="business_monthly_income" class="form-label">Business Monthly Income:</label>
                        <input type="text" class="form-control" id="business_monthly_income" name="business_monthly_income" value="{{ $application->business_monthly_income}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="house_type" class="form-label">House Type:</label>
                        <input type="text" class="form-control" id="house_type" name="house_type" value="{{ $application->house_type}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="monthly_rental_income" class="form-label">Monthly Rental Income:</label>
                        <input type="text" class="form-control" id="monthly_rental_income" name="monthly_rental_income" value="{{ $application->monthly_rental_income}}" readonly>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="tracking_id" class="form-label">Monthly Rental Income:</label>
                        <input type="text" class="form-control" id="tracking_id" name="tracking_id" value="{{ $application->tracking_id}}" readonly>
                    </div>
                    <div class="col-12">
                        <label for="user_note">Client message / Special note!</label>
                        <input type="text" class="form-control" id="user_note" placeholder="Enter your special note" name="user_note" value="{{ $application->user_note }}" readonly>
                    </div>
                    <div class="col-12">
                        <label for="author_note">Author message / Any Special note!</label>
                        <input type="text" class="form-control" id="author_note" placeholder="Enter your special note" name="author_note" value="{{ $application->author_note }}">
                    </div>
                    @role('vendor')
                    <div class="col-12">
                        <label for="vendor_note">Vendor message / Any Special note!</label>
                        <input type="text" class="form-control" id="vendor_note" placeholder="Enter your special note" name="vendor_note" value="{{ $application->vendor_note }}">
                    </div>
                    @endrole
                    <div class="col-md-4 col-12">
                        <label class="form-label">Status</label>
						<select class="form-control" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="Disbursed" {{$application->status == 'Disbursed' ? 'selected' : ''}}>Disbursed</option>
                            <option value="Documents Pending" {{$application->status == 'Documents Pending' ? 'selected' : ''}}>Documents Pending</option>
                            <option value="Not Interested" {{$application->status == 'Not Interested' ? 'selected' : ''}}>Not Interested</option>
                            <option value="Not Response" {{$application->status == 'Not Response' ? 'selected' : ''}}>Not Response</option>
                            <option value="Contacted" {{$application->status == 'Contacted' ? 'selected' : ''}}>Contacted</option>
                            <option value="Not Eligible" {{$application->status == 'Not Eligible' ? 'selected' : ''}}>Not Eligible</option>
                            <option value="Decline" {{$application->status == 'Decline' ? 'selected' : ''}}>Decline</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-12">
                        <label class="form-label">Send to vendor</label>
						<select class="form-control" name="status" id="status">
                            <option value="">Select Vendor</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{$vendor->id}}" {{$vendor->id == $application->send_to_vendor ? 'selected' : ''}}>{{$vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>

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
