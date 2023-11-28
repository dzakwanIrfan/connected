@extends('projects.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new task</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/tasks/{{ $task->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <input type="hidden" class="form-control @error('id_project') is-invalid @enderror" id="id_project" name="id_project" required autofocus value="{{ old('id_project', $task->id_project) }}">
            </div>
            @can('owner')
            <div class="mb-3">
              <label for="nama_task" class="form-label">Nama Task</label>
              <input type="text" class="form-control @error('nama_task') is-invalid @enderror" id="nama_task" name="nama_task" required autofocus value="{{ old('nama_task', $task->nama_task) }}">
              @error('nama_task')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="deskripsi_task" class="form-label">Deskripsi Task</label>
              <textarea class="form-control @error('deskripsi_task') is-invalid @enderror" name="deskripsi_task" id="deskripsi_task" cols="30" rows="10">{{ old('deskripsi_task', $task->deskripsi_task) }}</textarea>
              @error('deskripsi_task')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            @endcan
            @can('owner')
            <div class="mb-3">
              <label for="mulai" class="form-label">Mulai</label>
              <input type="date" class="form-control @error('mulai') is-invalid @enderror" id="mulai" name="mulai" value="{{ old('mulai', $task->mulai) }}">
              @error('mulai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="selesai" class="form-label">Selesai</label>
              <input type="date" class="form-control @error('selesai') is-invalid @enderror" id="selesai" name="selesai" value="{{ old('selesai', $task->selesai) }}">
              @error('selesai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            @endcan
            @can('staff')
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <input type="range" min="0" max="100" value="{{ $task->status }}" class="slider" id="status" name="status">
          </div>
          <div id="percentage">{{ $task->status }}%</div>
            @endcan
            {{-- <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                  @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div> --}}
            {{-- <div class="mb-3">
              <label for="image" class="form-label">Post image</label>
              <img class="img-preview img-fluid mb-3 col-sm-5">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body') }}">

              <trix-editor input="body"></trix-editor>
            </div> --}}
            <button type="submit" class="btn btn-primary">Edit task</button>
        </form>
    </div>

    {{-- <script>
      const title = document.getElementById('title');
      const slug = document.getElementById('slug');

      title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

      function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
      }
    </script> --}}
    <script>
      var slider = document.getElementById("status");
      var value = slider.value;
      if (value < 25) {
        slider.style.background = 'red';
      } else if (value < 75) {
        slider.style.background = 'yellow';
      } else {
        slider.style.background = 'green';
      }

      document.addEventListener('DOMContentLoaded', function() {
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
              var mulaiInput = document.getElementById('mulai');
              var selesaiInput = document.getElementById('selesai');
              
              // Ubah string tanggal menjadi objek Date
              var mulaiDate = new Date(mulaiInput.value);
              var selesaiDate = new Date(selesaiInput.value);
  
              // Periksa apakah tanggal selesai lebih awal dari tanggal mulai
              if (selesaiDate < mulaiDate) {
                  alert('Tanggal Selesai harus lebih besar atau sama dengan Tanggal Mulai.');
                  event.preventDefault(); // Mencegah pengiriman formulir jika tanggal tidak valid
              }
          });
      });
    </script>
@endsection