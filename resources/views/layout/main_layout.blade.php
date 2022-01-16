<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  @include('layout.css_global')
  @yield('css_custom')
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      @include('layout.navbar')
      @include('layout.navbar2')
      <div class="main-content">
        <section class="section">
          @yield('breadcrumb')
          @yield('content')
        </section>
      </div>
      @include('layout.footer')
    </div>
  </div>
@include('layout.js_global')
</body>
@yield('script')
</html>