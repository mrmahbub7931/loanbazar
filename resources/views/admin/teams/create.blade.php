@extends('admin.layouts.master')

@section('title', 'New Team member')

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
                    <h5 class="mb-0 text-primary">New Team member</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data" id="teamsForm" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-12">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="col-md-12">
                        <label for="facebook_url" class="form-label">Facebook Url</label>
                        <div class="dynamic_field">
                            <input type="text" name="facebook_url" class="form-control" id="facebook_url">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="linkedin_url" class="form-label">Linkedin Url</label>
                        <div class="dynamic_field">
                            <input type="text" name="linkedin_url" class="form-control" id="linkedin_url">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="instagram_url" class="form-label">Instagram Url</label>
                        <div class="dynamic_field">
                            <input type="text" name="instagram_url" class="form-control" id="instagram_url">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="team_image" class="form-label">Profile image</label>
						<input class="form-control" type="file" id="team_image" name="team_image">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="deal_status" value="1" name="status">
                            <label class="form-check-label" for="deal_status">Status</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

