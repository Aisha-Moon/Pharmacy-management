@extends('admin.layouts.app')
@section('content')



 <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

                <a href="{{ url('admin/customers') }}">
              <div class="card-body">
                <h5 class="card-title">Customers</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                   <i class="bi bi-people"></i>

                  </div>
                  <div class="ps-3">
                    <h6>{{ $customerCount }}</h6>

                  </div>
                </div>
              </div>
            </a>
            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">Medicines</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ url('admin/medicines') }}"><h6>{{ $medicineCount }}</h6></a>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">Medicines Stock</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-archive"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ url('admin/medicines_stock') }}"><h6>{{ $medicineStockCount }}</h6></a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">Suppliers</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ url('admin/suppliers') }}"><h6>{{ $suppliersCount }}</h6></a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">Invoices</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-text"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ url('admin/invoices') }}"><h6>{{ $invoicesCount }}</h6></a>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">Purchases</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ url('admin/purchases') }}"><h6>{{ $purchasesCount }}</h6></a>

                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>




@endsection
