@extends('dashboard.layouts.main')

@section('container')
      @foreach ($projects as $project)
          <div class="card">
            <div class="card-top">
              <div class="card-edit">
                <a href="/projects/{{ $project->id }}/edit" class="edit">
                  Edit
                </a>
              </div>
              <div class="card-delete">
                <form action="/projects/{{ $project->id }}" method="post" class="delete-form" enctype="multipart/form-data">
                  @method('delete')
                  @csrf
                  <button class="delete-button" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
              </div>
            </div>
              <div class="card-img">
              @if ($project->image)
              <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-card"> 
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="img-card">
              @endif
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="/projects/{{ $project->id }}/tasks">{{ $project->nama_project }}</a></h5> 
                <p class="card-text">{{ $project->deskripsi_project }}</p>
                <p class="card-date">Dimulai dari: <br>{{ $project->mulai }} <br></p>
                <p class="card-date">Selesai: <br> {{ $project->selesai }} <br></p>
              </div>
            </div>
      @endforeach
@endsection