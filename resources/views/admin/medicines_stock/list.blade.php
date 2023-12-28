@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1> Medicines Stock List </h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/medicines_stock/add') }} " class="btn btn-primary">Add New Medicine Stock</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Batch ID</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ !empty($value->getMedicineName->name) ? $value->getMedicineName->name : '' }}</td>
                                        <td>{{ $value->batch_id }}</td>
                                        <td>{{ date('d-m-Y H:i:s',strtotime($value->expiry_date)) }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->mrp }}</td>
                                        <td>{{ $value->rate }}</td>
                                        <td>{{ date('d-m-Y H:i:s',strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/medicines_stock/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('admin/medicines_stock/delete/'.$value->id) }}" onclick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

