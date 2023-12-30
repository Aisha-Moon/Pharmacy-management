@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
<h1>Add Purchase </h1>
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
                    <form action="{{ url('admin/purchases/add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Suppliers Name <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <select name="suppliers_id" class="form-control" required>
                                    <option value="">Select Suppliers name</option>
                                    @foreach ($getSupplier as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Invoices ID<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <select name="invoices_id" class="form-control" required>
                                    <option value="">Select Invoices ID</option>
                                    @foreach ($getInvoice as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="voucher_number" class="col-sm-2 col-form-label">Voucher Number <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="voucher_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="purchase_date" class="col-sm-2 col-form-label">Purchase Date <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="purchase_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="total_amount" class="col-sm-2 col-form-label">Total Amount <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="total_amount" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="payment_status" class="col-sm-2 col-form-label">Payment Status <span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <select name="payment_status" class="form-control" required>
                                    <option value="">Select Payment Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Accept</option>
                                    <option value="3">Cancel</option>


                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Save Purchase</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
