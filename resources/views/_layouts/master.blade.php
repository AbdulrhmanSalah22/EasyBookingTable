<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
       @yield('title','EasyBookingTable')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  @yield('custom-styles')
</head>

<body class="hold-transition sidebar-mini">
@include('_layouts.top-nav')
@include('_layouts.side-menu')

<div class="content-wrapper">
    @yield('content')
</div>

@include('_layouts.footer')
@include('_layouts.script')
@yield('custom-scripts')

</body>
</html>
