@extends('workbench.layouts.main')

@section('container')
<hr style="width: 172vh;">
  <div class="col">
  @foreach ($projects as $project)
  <div class="">
    <a href="/projects/{{ $project->id }}/tasks" class="text-decoration-none text-dark">
      <div class="card">
        @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-card"> 
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="img-card">
        @endif
      </a>
          <div class="card-body">
            <h5 class="card-title"><a href="/projects/{{ $project->id }}/tasks" class="text-decoration-none text-dark">{{ $project->nama_project }}</a></h5> 
            <p class="card-text">{{ $project->deskripsi_project }}</p>
            <p class="card-date">Dimulai dari: <br>{{ $project->mulai }} <br></p>
                <p class="card-date">Selesai: <br> {{ $project->selesai }} <br></p>
          </div>
        </div>
  </div>
  @endforeach
  </div>
@endsection