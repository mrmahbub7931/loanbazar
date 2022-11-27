@extends('admin.layouts.master')

@section('title', 'New Counter')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
       
        <div class="card border-top border-0 border-4 border-primary">
            @if ($errors->any())
            <div class="alert alert-danger print-success-msg">
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
                    <h5 class="mb-0 text-primary">New Counter</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.counters.store') }}" id="counterForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="col-md-12">
                        <label for="card_disbursed" class="form-label">Card Disbursed</label>
                        <input type="text" class="form-control" id="card_disbursed" name="card_disbursed">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="client_served" class="form-label">Clients Served</label>
                        <input type="text" class="form-control" id="client_served" name="client_served">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="loan_disbursed" class="form-label">Core loan Disbursed</label>
                        <input type="text" class="form-control" id="loan_disbursed" name="loan_disbursed">
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5 text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
@endpush
