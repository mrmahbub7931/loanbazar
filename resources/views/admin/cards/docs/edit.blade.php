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
                    <h5 class="mb-0 text-primary">Create Card Item</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.cards.docs.update', $cardDoc->id) }}" id="serviceDocsForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="service_title" class="form-label">Documents Title</label>
						<input class="form-control" type="text" id="service_title" name="service_title" value="{{ $cardDoc->title }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="serviceDocs" class="form-label">Service Docs</label>
						<textarea name="service_docs" id="serviceDocs" cols="30" rows="10">{{ $cardDoc->body }}</textarea>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label my-3" for="status">Select Card Service</label>
                        <select name="card_service_id" id="card_service_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($cards as $item)
                            <option value="{{ $item->id }}" {{ $cardDoc->card_service_id == $item->id ? 'selected' : '' }}>{{ $item->service_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label my-3" for="status">Status</label>
                        <select name="status" id="status" class="form-control @error( 'status' ) is-invalid @enderror">
                            <option value="1" {{$cardDoc->status == '1' ? 'selected' : ''}}>Active</option>
                            <option value="0" {{$cardDoc->status == '0' ? 'selected' : ''}}>Inactive</option>
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
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
    
@endpush
