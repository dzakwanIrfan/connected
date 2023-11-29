<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connected</title>
    <style>
      .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;
        background: red;
        outline: none;
        -webkit-transition: .2s;
        transition: opacity .2s;
      }
      
      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: grey;
        cursor: pointer;
      }

      .edit-task-btn{
        background-color: #19a7ce;
        border-radius: 5px;
        color: white;
        align-items: center;
        padding-left: 9px;
        padding-right: 9px;
        padding-bottom: 5px;
      }
      </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/usermanagement.css">
    <link rel="icon" href="/img/connected.png">
  </head>
  <body>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function previewImage() {
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function (oFREvent) {
              imgPreview.src = oFREvent.target.result;
          }
      }

      var slider = document.getElementById("status");
      var output = document.getElementById("percentage");
      
      slider.oninput = function() {
      output.innerHTML = this.value + '%';
      
        if (this.value < 25) {
          slider.style.background = 'red';
        } else if (this.value < 75) {
          slider.style.background = 'yellow';
        } else {
          slider.style.background = 'green';
        }
      }
      </script>
  </body>
</html>