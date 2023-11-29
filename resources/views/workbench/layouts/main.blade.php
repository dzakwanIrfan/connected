<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workbench</title>
    <link rel="stylesheet" href="/css/carduser.css">
    <link rel="stylesheet" href="/css/sidebar.css">
  </head>
  <body style="background-color: #b0daff">
  @include('dashboard.layouts.sidebar')
    <div class="kotak-right">
      <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
      @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>