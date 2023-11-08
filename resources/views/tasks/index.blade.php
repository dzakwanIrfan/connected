@extends('projects.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $project->nama_project }} task</h1>
  </div>

  <div class="table-responsive small">
    @can('owner')
      <a href="/tasks/create/{{ $project->id }}" class="btn btn-primary mb-3">Create new task</a>
      <a href="/dashboard" class="btn btn-dark mb-3">Back to Dashboard</a>
    @endcan
    @can('staff')
      <a href="/workbench" class="btn btn-dark mb-3">Back to Workbench</a>
    @endcan
    <table class="table table-striped table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Status</th>
          <th scope="col">File</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
          <th scope="col">Pekerja</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $task->nama_task }}</td>
          <td>{{ $task->deskripsi_task }}</td>
          <td>{{ $task->status }}</td>
          <td>{{ $task->file }}</td>
          <td>{{ $task->mulai }}</td>
          <td>{{ $task->selesai }}</td>
          <td>
            @if (isset($taskUsers[$task->id]) && $taskUsers[$task->id]->isNotEmpty())
                @foreach ($taskUsers[$task->id] as $user)
                    <a href="/users/{{ $user->id }}" class="text-black text-decoration-none">{{ $user->name }}</a> <br>
                @endforeach
                @can('owner')
                    <small><a href="/user-task/create/{{ $task->id }}" class="badge bg-primary text-decoration-none">Tambahkan pekerja</a></small>
                @endcan
            @else
                @can('owner')
                    <small><a href="/user-task/create/{{ $task->id }}" class="badge bg-primary text-decoration-none">Tambahkan pekerja</a></small>
                @endcan
            @endif
          </td>
        
          <td>
            <a href="/tasks/{{ $task->id }}/edit" class="badge bg-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg>
            </a>
            @can('owner')    
            <form action="/tasks/{{ $task->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
              </button>
            </form>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    @can('staff')
      <a href="/suggestions/create?id_project={{ $task->id_project }}">Add suggestion</a>
    @endcan
    
    @can('owner')
      <a href="/suggestions/{{ $task->id_project }}?id_project={{ $task->id_project }}">Suggestions</a>
    @endcan

@endsection