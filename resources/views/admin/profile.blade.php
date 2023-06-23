@extends('layouts.admin')

@section('content')        
  <section class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body row">
          <div class="col-md-3 px-2 m-3">
            <img src="/assets/img/profil/default.png" class="rounded-circle mx-auto img-profil" style="width: 200px; height:200px;">
          </div>

          <div class="col-md-6 my-3">
            <h2 class="m-0">Profil pengguna</h2>
            <hr>
            <form class="forms-sample" method="post" action="">
              @csrf
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <sub class="text-danger">Kosongkan jika tidak ingin mengganti password</sub>
              </div>
              <div class="row">
                <button type="submit" name="submit" value="profile" class="btn btn-primary mr-2 ml-auto">
                  <i class="mdi mdi-content-save"></i>
                  <span> Simpan</span>
                </button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection