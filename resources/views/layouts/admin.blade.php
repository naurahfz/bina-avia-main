<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.admin-head')
</head>
<body>
  <script>
    @if(session()->has('success'))
      Swal.fire({title:'Berhasil', text:'{{session('success')}}', icon:'success'})
    @endif
    @if(session()->has('error'))
      Swal.fire({title:'Error!', text:'{{session('error')}}', icon:'error'})
    @endif
    @if(session()->has('info'))
      Swal.fire({title:'Info', text:'{{session('info')}}', icon:'info'})
    @endif
    @if($errors->any())
      Swal.fire({title:'Error!', html:'{!! implode('', $errors->all(':message<br>')) !!}', icon:'error'})
    @endif
  </script>
  <div class="container-scroller">
    @include('partials.admin-navbar')
    <div class="container-fluid page-body-wrapper">
      @include('partials.admin-sidebar')
      <div class="main-panel">
        <div class="content-wrapper pt-4">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        @include('partials.admin-footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('partials.admin-script')
  @yield('script')
</body>

</html>