@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1>Add Medicines Stock</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Medicines Stock
                    </h5>
                    <form action="{{ url('admin/medicines_stock/add') }}" method="post" enctype="multipart/form-data">


                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Medicine Name <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="medicines_id" class="form-control" required>
                                        <option value="">Select Medicine name</option>
                                        @foreach ($getRecord as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="batch_id" class="col-sm-2 col-form-label">Batch Id<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="batch_id" value="{{ old('batch_id') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="expiry_date" value="{{ old('expiry_date')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" value="{{ old('quantity')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mrp" class="col-sm-2 col-form-label">MRP<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="mrp" value="{{ old('mrp')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rate" class="col-sm-2 col-form-label">Rate<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="rate" value="{{ old('rate')}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Save Medicine</button>
                                </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
