<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connected | Workspcae</title>

    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/card.css">
    <link rel="stylesheet" href="/css/usermanagement.css">
  </head>
  <body style="background-color: #b0daff">
<div class="kotak">
    @include('dashboard.layouts.sidebar')
    <div class="kotak-right">
      <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
      <hr>
      <main class="col">
        @yield('container')
      </main>
  </div>
</div>
  </body>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>