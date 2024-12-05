<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')
  {{-- <link rel="icon" type="image/x-icon" href="{{asset('assetsBackend')}}/images/favicon.png"> --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assetsBackend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assetsBackend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assetsBackend')}}/dist/css/adminlte.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>