@extends('projects.layouts.main')

@section('container')
<div class="row justify-content-center">
    <h1 class="my-5">New Project Form</h1>
    <div class="col col-lg-8">
        <form action="/projects/{{ $project->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_project" class="form-label">Name Project</label>
                <input type="text" id="nama_project" name="nama_project" class="form-control" value="{{ old('nama_project', $project->nama_project) }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi_projek" class="form-label">Deskripsi Project</label>
                <textarea name="deskripsi_project" id="deskripsi_projek" class="form-control">{{ old('deskripsi_project', $project->deskripsi_project) }}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-3 col col-md-5">
                    <label for="mulai" class="form-label">Mulai Project</label>
                    <input type="date" id="mulai" name="mulai" class="form-control" value="{{ old('mulai', $project->mulai) }}">
                </div>
                <div class="mb-3 col col-md-5">
                    <label for="selesai" class="form-label">Selesai Project</label>
                    <input type="date" id="selesai" name="selesai" class="form-control" value="{{ old('selesai', $project->selesai) }}">
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" id="kirim" name="kirim" class="btn btn-primary" value="Edit project">
            </div>
        </form>
    </div>
</div>
@endsection