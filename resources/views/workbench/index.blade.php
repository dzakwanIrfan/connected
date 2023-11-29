@extends('workbench.layouts.main')

@section('container')
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