@extends('admin.layouts.master')

@section('title', 'Edit Post')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}" type="text/css"/>
	<link href="{{ asset('frontend/assets/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<form class="row g-3" action="{{ route('admin.posts.update',$post->id) }}" enctype="multipart/form-data" id="postForm" method="post">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-xl-8 mx-auto col-12">
       
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
                    <h5 class="mb-0 text-primary">Edit Post : "{{ $post->title }}"</h5>
                </div>
                <hr>
                    
                    <div class="col-md-12">
                        <label for="title" class="form-label">Post Title</label>
						<input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="body" class="form-label">Long Description</label>
						<textarea name="body" id="mytextarea" cols="30" rows="15">{{ $post->body }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="card_status" value="1" name="status" {{ $post->status ? 'checked' : '' }}>
                            <label class="form-check-label" for="card_status">Status</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Publish</button>
                    </div>
                
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="col-md-12">
                    <label for="featured_img" class="form-label">Featured Image</label>
                    <input class="form-control" type="file" id="featured_img" name="featured_img">
                    @if (!empty($post->featured_img))
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/blog/featured/'.$post->featured_img) }}" alt="" class="mt-3" width="150px" height="80px">
                    @endif
                </div>
                <div class="col-md-12 mt-4">
                    <label for="cover_img" class="form-label">Cover Image</label>
                    <input class="form-control" type="file" id="cover_img" name="cover_img">
                    @if (!empty($post->cover_img))
                        <img src="{{ Storage::disk('public')->url('frontend/assets/img/blog/cover/'.$post->cover_img) }}" alt="" class="mt-3" width="150px" height="80px">
                    @endif
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label my-3" for="categories">Category</label>
                        <select name="categories[]" id="categories" class="multiple-select" multiple="multiple" data-placeholder="Choose category" >
                            @foreach ($categories as $category)
                                <option @foreach($post->categories as $postcategory)
                                        {{ $postcategory->id == $category->id ? 'selected' : '' }}
                                    @endforeach  value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            
                        </select>
                        <a href="{{ route('admin.categories.create') }}" target="_blank" class="btn btn-info btn-sm text-white mt-4">Create new Category</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label my-3" for="writer_id">Writer</label>
                        <select class="single-select" name="writer_id" id="writer_id">
                            @foreach ($writers as $writer)
                                <option {{ $post->writer_id == $writer->id ? 'selected' : '' }} value="{{$writer->id}}">{{$writer->writer_name}}</option>
                            @endforeach
                            
                        </select>
                        <a href="{{ route('admin.writers.create') }}" target="_blank" class="btn btn-info btn-sm text-white mt-4">Create writer</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
@endsection

@push('js')
    <script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
    {{-- <script src="assets/plugins/select2/js/select2.min.js"></script> --}}
	<script src="{{ asset('frontend/assets/js/form-select2.js') }}"></script>
    <script src='{{ asset('admin/assets/js/tinymce.min.js') }}' referrerpolicy="origin">
    </script>
    <script src="{{ asset('admin/assets/js/form-text-editor.js') }}"></script>
@endpush
