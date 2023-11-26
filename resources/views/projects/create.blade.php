@extends('projects.layouts.main')

@section('container')
<div class="row justify-content-center">
    <h1 class="my-5">New Project Form</h1>
    <div class="col col-lg-8">
        <form action="/projects" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_project" class="form-label">Name Project</label>
                <input type="text" id="nama_project" name="nama_project" class="form-control">
            </div>
            <div class="mb-3">
                <label for="deskripsi_projek" class="form-label">Deskripsi Project</label>
                <textarea name="deskripsi_project" id="deskripsi_projek" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Project Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-3 col col-md-5">
                    <label for="mulai" class="form-label">Mulai Project</label>
                    <input type="date" id="mulai" name="mulai" class="form-control">
                </div>
                <div class="mb-3 col col-md-5">
                    <label for="selesai" class="form-label">Selesai Project</label>
                    <input type="date" id="selesai" name="selesai" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" id="kirim" name="kirim" class="btn btn-primary" value="Buat project baru">
            </div>
        </form>
    </div>
</div>

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
</script>

@endsection