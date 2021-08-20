<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NEPTUNE | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @include('layouts.css')
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed text-xs">
<div class="wrapper">

  @include('layouts.nav')

  @include('layouts.sidebar')

  <div class="content-wrapper text-sm">

    <section class="content-header">
      <br>
      <br>
      <br>
      @yield('content')
    </section>

  </div>
  {{-- @include('layouts.footer') --}}


</div>

@include('layouts.scripts')
@yield('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;

// for sidebar menu entirely but not cover treeview
    // $('ul.nav-sidebar a').filter(function() {
    //     return this.href == url;
    // }).addClass('active');



});
</script>
</body>
</html>
