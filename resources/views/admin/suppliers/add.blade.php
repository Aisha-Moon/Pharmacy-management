@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1>Add Suppliers </h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">

                            Add New Supplier
                    </h5>
                    <form action="{{ url('admin/suppliers/add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="supplier_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="supplier_email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="contact_number" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Address </label>
                            <div class="col-sm-10">
                                <textarea name="address" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Save Supplier</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
