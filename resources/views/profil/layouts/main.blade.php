<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="/css/profil.css">
    <link rel="icon" href="/img/connected.png">
  </head>
  <body>
    <div>
      @yield('container')
    </div>
    <script>
      document.getElementById('profile-image-upload').addEventListener('change', function(e) {
          var img = document.querySelector('.img-card');
          var reader = new FileReader();
      
          reader.onloadend = function() {
              img.src = reader.result;
          }
      
          reader.readAsDataURL(e.target.files[0]);
      });
      </script>
  </body>
</html>