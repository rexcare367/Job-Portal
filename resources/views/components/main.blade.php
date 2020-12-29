@include('partial.header')
@include('partial.navbar')

@if(auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('admin'))
  @include('partial.admin.sidebar')
@else
  @include('partial.user.sidebar')
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  {{ $slot }}
</div>
<!-- /.content-wrapper -->

@include('partial.footer')

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('js/demo.js') }}"></script>--}}
<script src="{{ asset('js/dashboard2.js') }}"></script>

@stack('js')
</body>
</html>

