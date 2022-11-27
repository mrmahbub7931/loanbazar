@extends('admin.layouts.master')
@php 
    $title = $page->title ? $page->title : '';
@endphp
@section('title', 'Update '.$title.' Page')

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
                    <h5 class="mb-0 text-primary">Update {{ $page->title }} page</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.page.update',$page->id) }}" enctype="multipart/form-data" id="applicationForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="title" class="form-label">Page Title</label>
						<input class="form-control" type="text" id="title" name="title" value="{{ $page->title }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="body" class="form-label">Body</label>
						<textarea name="body" id="mytextarea" cols="30" rows="20">{!! $page->body !!}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="cover_img" class="form-label">Cover Image</label>
						<input class="form-control" type="file" id="cover_img" name="cover_img">
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/pages/'.$page->cover_img) }}" alt="" width="150" height="80" class="my-2">
                    </div>
                    <hr>
                    <hr>
                    <h3>SEO Section</h3>
                    <div class="col-md-12">
                        <label for="meta_title" class="form-label">Meta title</label>
						<input class="form-control" type="text" id="meta_title" name="meta_title" value="{{ $page->meta_title }}">
                    </div>
                    <div class="col-md-12">
                        <label for="meta_desc" class="form-label">Meta description</label>
						<textarea name="meta_desc" id="disclaimer" cols="30" rows="10">{!! $page->meta_desc !!}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-check-label my-3" for="card_status">Status</label>
                            <select name="status" id="card_status" class="form-control @error( 'status' ) is-invalid @enderror">
                                <option value="1" {{$page->status == '1' ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$page->status == '0' ? 'selected' : ''}}>Inactive</option>
                            </select>
                           
                        </div>
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
