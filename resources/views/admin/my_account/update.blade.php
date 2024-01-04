@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1>Profile Update</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">

                            Add New Purchase
                    </h5>
                    <form action="{{ url('admin/my_account') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{ $getRecord->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required value="{{ $getRecord->email }}">
                                <span style="color:red;">{{ $errors->first('email') }}</span>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profile_img" class="col-sm-2 col-form-label">Profile Image<span style="color:red;"></span></label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_img" class="form-control" >
                                @if(!empty($getRecord->profile_img))
                                <img src="{{ $getRecord->getProfileImg() }}" alt="" height="100px" width="100px">
                                @endif

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" >
                                (Leave it blank if you will not change the password)
                                <span style="color:red;">{{ $errors->first('password') }}</span>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
