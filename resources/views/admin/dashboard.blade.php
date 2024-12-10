@extends('admin.app')

@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Dashboard')
@section('navbar-item', 'Admin')

@section('content')
    <!-- Content -->
    <div class="row g-2">
        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
          <div class="card d-flex flex-row shadow">
            <i class="bi bi-currency-dollar fs-2 align-self-center rounded-circle bg-success-subtle px-2 ms-3"></i>
            <div class="d-flex flex-column pt-3 ps-3 mb-3">
              <h4>104.000.000</h4>
              <small class="fw-semibold">Balance</small>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
          <div class="card d-flex flex-row shadow">
            <i class="bi bi-currency-dollar fs-2  align-self-center rounded-circle bg-success-subtle px-2 ms-3"></i>
            <div class="d-flex flex-column pt-3 ps-3 mb-3">
              <h4>104.000.000</h4>
              <small class="fw-semibold">Forex Need</small>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
          <div class="card d-flex flex-row shadow">
            <i class="bi bi-file-earmark-check fs-2 align-self-center rounded-circle bg-success-subtle px-2 ms-3"></i>
            <div class="d-flex flex-column pt-3 ps-3 mb-3">
              <h4>-20.000.000</h4> 
              <small class="fw-semibold">Receivable</small>
            </div>
          </div>   
        </div>

        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
          <div class=" card d-flex flex-row shadow" >
            <i class="bi bi-file-earmark-text fs-2 align-self-center rounded-circle bg-success-subtle px-2 ms-3"></i>
            <div class="d-flex flex-column pt-3 ps-3 mb-3">
              <h4>21</h4>
              <small class="fw-semibold">Project Active</small>
            </div>
          </div>     
        </div>
      </div>  

      <div class="row g-2 mt-3">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <div class="card shadow p-3">
                <h5 class="card-title">Jumlah Suppliers</h5><hr class="text-dark">
                <div class="card-body">
                  <p class="card-text text-center fs-3 fw-bold">12</p>
                  <P class="text-center fw-semibold">Supplier</P>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <div class="card shadow p-3">
                <h5 class="card-title">Jumlah Material</h5><hr class="text-dark">
                <div class="card-body">
                  <p class="card-text text-center fs-3 fw-bold">20</p>
                  <P class="text-center fw-semibold">Material</P>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <div class="card shadow p-3">
                <h5 class="card-title">Jumlah Pengiriman</h5><hr class="text-dark">
                <div class="card-body">
                  <p class="card-text text-center fs-3 fw-bold">20</p>
                  <P class="text-center fw-semibold">Pengiriman</P>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <div class="card shadow p-3">
                <h5 class="card-title">Jumlah Kontrak</h5><hr class="text-dark">
                <div class="card-body">
                  <p class="card-text text-center fs-3 fw-bold">9</p>
                  <P class="text-center fw-semibold">Kontrak</P>
                </div>
              </div>
            </div>
      </div>

      <div class="row g-2 mt-3 mb-3">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card shadow p-3">
            <h5 class="card-title">Top Suppliers</h5><hr class="text-dark">
            <div class="card-body">
              <p class="card-text text-center">Table top of 5</p>
              
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card shadow p-3">
              <h5 class="card-title">Vendor</h5><hr class="text-dark">
              <div class="card-body d-flex flex-row flex-wrap">
                <div class="left col-12 col-sm-12 col-md-6 col-lg-6">
                  <!-- PIE CHART -->
                  <img src="{{ asset('Chart.png') }}" alt="">

                  <!--  -->
                </div>
                <div class="right col-12 col-sm-12 col-md-6 col-lg-6">
                  <!-- Penjelasan Pie Chart -->
                  <p class=""><small class="bg-success text-success me-3">.......</small>Green</p>
                  <p class=""><small class="bg-danger text-danger me-3">.......</small>Red</p>
                  <p class=""><small class="bg-warning text-warning me-3">.......</small>Yellow</p>

                  <!--  -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
  
