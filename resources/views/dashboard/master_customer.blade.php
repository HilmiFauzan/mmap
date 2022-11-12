<!DOCTYPE html>
<html style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://web_ayam_petelur.test/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://web_ayam_petelur.test/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://web_ayam_petelur.test/dist/css/adminlte.min.css">
  <!-- icon title -->
  <link rel="shortcut icon" type="image/x-icon" href="https://iconarchive.com/download/i102631/graphicloads/flat-finance/global.ico">

  <style type="text/css">/* Chart.js */
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
  </style>
</head>
<body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-open">

  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="http://web_ayam_petelur.test/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

      @include('dashboard/dashboard_partials_customer/navbar-dash')
      @include('dashboard/dashboard_partials_customer/sidebar-dash')
      @yield('content')
      @include('dashboard/dashboard_partials_customer/footer-dash')

  </div>

<script src="http://web_ayam_petelur.test/plugins/jquery/jquery.min.js"></script>
  <script src="http://web_ayam_petelur.test/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://web_ayam_petelur.test/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="http://web_ayam_petelur.test/dist/js/adminlte.js"></script>
<script src="http://web_ayam_petelur.test/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="http://web_ayam_petelur.test/plugins/raphael/raphael.min.js"></script>
<script src="http://web_ayam_petelur.test/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="http://web_ayam_petelur.test/plugins/chart.js/Chart.min.js"></script>
@yield('script')

</body>
</html>