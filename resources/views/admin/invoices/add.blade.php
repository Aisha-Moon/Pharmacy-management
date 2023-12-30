@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1>Add Invoices</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts._message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Invoices
                    </h5>
                    <form action="{{ url('admin/invoices/add') }}" method="post" enctype="multipart/form-data">


                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Name <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="customers_id" class="form-control" required>
                                        <option value="">Select Customer name</option>
                                        @foreach ($getRecord as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="net_total" class="col-sm-2 col-form-label">Net Total<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="net_total" value="{{ old('net_total') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="invoices_date" class="col-sm-2 col-form-label">Invoices Date<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="invoices_date" value="{{ old('invoices_date')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="total_amount" class="col-sm-2 col-form-label">Total Amount<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_amount" value="{{ old('total_amount')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="total_discount" class="col-sm-2 col-form-label">Total Discount<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="total_discount" value="{{ old('total_discount')}}" class="form-control" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Save Invoices</button>
                                </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
