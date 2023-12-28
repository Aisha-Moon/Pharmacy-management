@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1> Suppliers List </h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/suppliers/add') }}" class="btn btn-primary">Add New Supplier</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Supplier Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->supplier_name }}</td>
                                        <td>{{ $value->supplier_email }}</td>
                                        <td>{{ $value->contact_number }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ date('d-m-Y H:i:s',strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/suppliers/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('admin/suppliers/delete/'.$value->id) }}" onclick="return confirm('Are You Sure Want to Delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

