@include('partial._header')
@include('partial._navbar')

@include('partial._sidebar')


<!-- Content Wrapper. Contains page content -->
<div id="app" class="content-wrapper">
  {{ $slot }}
</div>
<!-- /.content-wrapper -->

@include('partial._footer')

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>

@stack('js')
</body>
</html>
