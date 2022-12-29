<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin|Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/fontawesome-free/css/all.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('frontend/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/summernote/summernote-bs4.min.css') }}">
   {{-- toster>--}}
   <link rel="stylesheet" href="{{ asset('frontend/plugins/toastr/toastr.css') }}">
   <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/simplemde/simplemde.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

  

  @include('Admin.topbar')

  @include('Admin.sidebar')

  @yield('content')




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('frontend') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('frontend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('frontend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('frontend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('frontend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('frontend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('frontend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('frontend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('frontend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('frontend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('frontend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('frontend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('frontend') }}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('frontend') }}/dist/js/pages/dashboard.js"></script>
<script src="{{ asset('frontend/plugins/toastr/toastr.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('frontend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('frontend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })
</script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
    $(document).on("click",".dekete",function(e){
        e.preventDefault();
        var link=$(this).attr("href");
        swal({
            title:"Are you want to delete",
            text:"Once Delete,This will be permanently Delete!",
            icon:"warning",
            buttons:true,
            dangerMode:true,
        })
        .then((willDelete)=>{
            if(willDelete){
                window.location.href=link;
            }else{
                swal("Safe Data !");
            }
        });
    });

</script>
<script>
    @if (Session::has('message'))

    var type="{{ Session::get('alert-type','info') }}"

    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;

    }

    @endif
</script>
</body>
</html>
