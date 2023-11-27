@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      @foreach ($projects as $project)
      <div class="col-md-4 mb-3">
          <div class="card">
              <div class="position-relative">
                <form action="/projects/{{ $project->id }}" method="post" class="d-inline" enctype="multipart/form-data">
                  @method('delete')
                  @csrf
                  <button class="hapus position-absolute bg-danger px-2 py-1 text-white" onclick="return confirm('Are you sure?');"><i class="bi bi-x-circle"></i></button>
                </form>
              </div>
              <div class="position-relative">
                <a href="/projects/{{ $project->id }}/edit" class="edit position-absolute bg-warning px-2 py-1 text-decoration-none text-white" style="left: 40px">
                  <i class="bi bi-pencil"></i>
                </a>
              </div>
              @if ($project->image)
              <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-fluid"> 
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="img-fluid">
              @endif
              <div class="card-body">
                <h5 class="card-title"><a href="/projects/{{ $project->id }}/tasks" class="text-decoration-none text-dark">{{ $project->nama_project }}</a></h5> 
                <p class="card-text">{{ $project->deskripsi_project }}</p>
              </div>
            </div>
      </div>
      @endforeach
    </div>
@endsection