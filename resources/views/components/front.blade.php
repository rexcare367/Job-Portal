<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title', 'Jobs') | {{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />

  @stack('css')
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" width="50px" alt="Brand Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="fas fa-briefcase"></i> Jobs <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> <!-- /.navbar -->

  <main role="main" class="container mt-5">

    {{ $slot }}

  </main><!-- /.container -->

  <footer class="footer py-3">
    <div class="container">
      <div class="col-12">&copy; 2020 - {{ config('app.name') }}</div>
    </div>
  </footer> <!-- /.footer -->


  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script type="application/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script type="application/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('js')
</body>

</html>
