@extends('workbench.layouts.main')

@section('container')
  <form action="/logout" method="post">
    @csrf
    <button type="submit" class="">Logout</button>
  </form>
  <div class="btn ">
    <a href="/users/{{ $user->id }}" class="">{{ $user->name }}</a>
  </div>
  <div class="">
  <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
  </div>
  <div class="col">
  @foreach ($projects as $project)
  <div class="">
      <div class="card">
        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-card"> 
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="img-card">
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