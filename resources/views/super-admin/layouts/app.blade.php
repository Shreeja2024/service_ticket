<!DOCTYPE html>
<html lang="en">

@include('super-admin.partials.head')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('super-admin.partials.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('super-admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="#">TE</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
  </footer>
</div>
<!-- ./wrapper -->

@include('super-admin.partials.scripts')
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
@yield('script')
<script>
@if (Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ Session::get('success') }}");
@endif
@if (Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ Session::get('error') }}");
@endif
</script>
</body>
</html>
