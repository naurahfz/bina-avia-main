  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
  
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
  <script src="{{ asset('assets/js/chart.js') }}"></script>
  <script src="{{ asset('assets/js/editorDemo.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- <script src="{{ asset('assets/js/light-gallery.js') }}"></script> -->

  <!-- Datatable default show entries -->  
  <script type="text/javascript">
    $(document).ready(function(){
      $('#data-alumni').dataTable({
        "aLengthMenu":[[25, 50, 100, 200, -1], [25, 50, 100, 200, "Semua"]],
        "pageLength":25
      })
    })
  </script>