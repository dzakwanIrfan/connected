@extends('dashboard.layouts.main')

@section('container')
      @foreach ($projects as $project)
          <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
          <div class="card">
            <div class="card-konten">
              <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="">
            <div class="">
              <h5 class=""><a href="/projects/{{ $project->id }}/tasks" class="">{{ $project->nama_project }}</a></h5> 
              <p class="">{{ $project->deskripsi_project }}</p>
            </div>
            <div class="">
              <a href="/projects/{{ $project->id }}/edit" class="" style="">
                <i class="bi bi-pencil"></i>
              </a>
            </div>
              <form action="/projects/{{ $project->id }}" method="post" class="">
                @method('delete')
                @csrf
                <button class="" onclick="return confirm('Are you sure?');"><ion-icon name="trash-outline"></ion-icon></button>
              </form>
            </div>
          </div>
              
      @endforeach
@endsection