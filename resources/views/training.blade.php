@extends('layouts.index')

@section('hero')
  @include('sections.hero')
@endsection

@section('content')
<section id="what-we-do" class="about what-we-do">
  <div class="container">
      <div class="section-title">
          <h2>Program Pelatihan</h2>
          <div class="row justify-content-center">
            <p class="fs-5 col-lg-10">
            Bina Avia Persada memiliki syarat dan ketentuan yang harus dipenuhi agar dapat mengikuti program pelatihan
            </p>
            </div>
      </div>

      
      <div class="row mb-4 justify-content-center mt-4">
          <div class="col-lg-5">
              <img src="assets/img/training/bap.png" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-5 pt-4 pt-lg-0">
          <h3 class="mb-4 fs-3">Syarat Umum Pendaftaran</h3>
              <ul>
                  <li><i class="bx bx-check-double"></i> Lulusan SMA/SMK/Diploma/Sarjana</li>
                  <li><i class="bx bx-check-double"></i> FC ijazah terakhir & data diri</li>
                  <li><i class="bx bx-check-double"></i> Berpenampilan menarik</li>
                  <li><i class="bx bx-check-double"></i> Sehat jasmani & rohani</li>
                  <li><i class="bx bx-check-double"></i> Tidak buta warna</li>
                  <li><i class="bx bx-check-double"></i> Belum menikah</li>
                  <li><i class="bx bx-check-double"></i> Pas foto berwarna ukuran 4x6 sebanyak 2 lembar</li>
                  <li><i class="bx bx-check-double"></i> Lolos seleksi masuk (tertulis & interview) </li>
              </ul>
          </div>
      </div>


      <div class="row mb-4 justify-content-center mt-5">
          <div class="col-lg-5">
              <img src="assets/img/training/pramugari.png" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-5 pt-4 pt-lg-0">
              <h4 class="mb-4 fs-3 fw-semibold">Syarat Khusus <b class="text-primary">Pramugari</b></h4>
              <div>
                  <p>Untuk mengikuti program pelatihan Pramugari, terdapat beberapa persyaratan yang harus dipenuhi. Berikut syarat pendaftaran Pramugari.</p>
                  <ul>
                      <li><i class="bx bx-check-double"></i>Putri</li>
                      <li><i class="bx bx-check-double"></i>Usia max 21 tahun (D3/S1 22 tahun)</li>
                      <li><i class="bx bx-check-double"></i>Berat badan ideal</li>
                      <li><i class="bx bx-check-double"></i>Tidak berkacamata</li>
                  </ul>
              </div>
          </div>
      </div>
      

      <div class="row mb-4 justify-content-center mt-5">
          <div class="col-lg-5">
              <img src="assets/img/training/ground-staff.png" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-5 pt-4 pt-lg-0">
              <h4 class="mb-4 fs-3 fw-semibold">Syarat Khusus <b class="text-primary">Ground Staff</b></h4>
              <div>
                  <p>Untuk mengikuti program pelatihan Ground Staff terdapat beberapa persyaratan yang harus dipenuhi. Berikut syarat pendaftaran Ground Staff.</p>
                  <ul>
                      <li><i class="bx bx-check-double"></i>Putra / Putri</li>
                      <li><i class="bx bx-check-double"></i>Usia max. 22 tahun (D3/S1 23 tahun)</li>
                      <li><i class="bx bx-check-double"></i>Tinggi badan min. 160 cm (putri) & 170 cm (putra)</li>
                  </ul>
              </div>
          </div>
      </div>

</section>
<hr>
@endsection