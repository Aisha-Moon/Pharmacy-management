@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1> Website Logo Update</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">

                            Website Logo
                    </h5>
                    <form action="{{ url('admin/website_logo_update') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="website_name" class="col-sm-2 col-form-label">Website Name<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="website_name" class="form-control" required value="{{ $getRecord->website_name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website_logo" class="col-sm-2 col-form-label">Website Logo Update<span style="color:red;"></span></label>
                            <div class="col-sm-10">
                                <input type="file" name="website_logo" class="form-control" >
                                @if(!empty($getRecord->website_logo))
                                <img src="{{ $getRecord->getLogo() }}" alt="" height="100px" width="100px">
                                @endif
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
