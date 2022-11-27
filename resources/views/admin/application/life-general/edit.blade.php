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
                <form class="row g-3" action="{{ route('admin.application.life.update', $application->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
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
                        <label for="location" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $application->location }}" readonly>
                    </div>
                    
                    <div class="col-md-4 col-12">
                        <label for="type" class="form-label">Application Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $application->insurance_type }}" readonly>
                    </div>
                    
                    <div class="col-12">
                        <label for="admin_note">Author message / Any Special note!</label>
                        <input type="text" class="form-control" id="admin_note" placeholder="Enter your special note" name="admin_note" value="{{ $application->admin_note }}">
                    </div>
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
