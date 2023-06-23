@extends('layouts.admin')

@section('content')
  <section class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Selamat datang, {{ Auth::user()->name }}</h2>
            <p class="d-none mb-md-0">Your analytics dashboard template.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
          
  <section class="row">
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card" style="background-position: right; background-repeat: no-repeat; background-size: contain; background-position-y: 10px;">
        <div style="background-color: #ffffff50;">
          <div class="card-body">
            <p class="card-title">Overview</p>

            <div class="d-flex flex-row align-items-center">
              <i class="mdi mdi-image-area"></i>
              <p class="mb-0 ml-1">Total Galeri : {{ $g_count }}</p>
            </div>
            
            <div class="d-flex flex-row align-items-center">
              <i class="mdi mdi-newspaper"></i>
              <p class="mb-0 ml-1">Total Berita : {{ $n_count }}</p>
            </div>
            
            <div class="d-flex flex-row align-items-center">
              <i class="mdi mdi-star-face"></i>
              <p class="mb-0 ml-1">Total Testimoni : {{ $t_count }}</p>
            </div>
            
            <div class="d-flex flex-row align-items-center">
              <i class="mdi mdi-account"></i>
              <p class="mb-0 ml-1">Total User : {{ $u_count }} Orang</p>
            </div>
          
          </div>
        </div>
        
      </div>
    </div>
  </section>
@endsection