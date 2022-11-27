@extends('admin.layouts.master')

@push('css')
    
@endpush

@section('title', 'New Category')

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
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
            <form class="row g-3" action="{{ route('admin.categories.store') }}" id="categriesForm" method="post">
                @csrf
                
                <div class="col-md-12">
                    <label for="name" class="form-label">Category name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <hr>
                <hr>
                <h3>SEO Part</h3>
                <div class="col-md-12">
                    <label for="meta_title" class="form-label">Meta title</label>
                    <input class="form-control" type="text" id="meta_title" name="meta_title">
                </div>
                
                <div class="col-md-12">
                    <label for="meta_desc" class="form-label">Meta description</label>
                    <textarea name="meta_desc" id="mytextarea" cols="30" rows="10"></textarea>
                </div>


                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="card_status" value="1" name="status">
                        <label class="form-check-label" for="card_status">Status</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-info px-5">Submit</button>
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

