@extends('workbench.layouts.main')

@section('container')
  <form action="/logout" method="post">
    @csrf
    <button type="submit" class="nav-link d-flex align-items-center gap-2 text-black"><i class="bi bi-box-arrow-right"></i> Logout</button>
  </form>
  <div class="btn btn-dark">
    <a href="/users/{{ $user->id }}" class="text-decoration-none text-white">{{ $user->name }}</a>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @foreach ($projects as $project)
  <div class="col-md-4 mb-3">
      <div class="card">
        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-fluid" style="width: 1200px; height: 150px; object-fit: cover;"> 
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