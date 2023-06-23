<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
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

    <!-- Header -->
    @include('partials.header')

    @yield('hero')

    <main id="main">
      @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    @include('partials.script')
  </body>
</html>