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
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
          <th scope="col">File</th>
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
          <td>
            <input type="range" min="0" max="100" value="{{ $task->status }}" class="slider" id="status{{ $task->id }}" disabled>
            <span id="percentage{{ $task->id }}">{{ $task->status }}%</span>
          </td>
          <td>{{ $task->mulai }}</td>
          <td>{{ $task->selesai }}</td>
          <td>
            @foreach ($task->userTasks as $userTask)
                @if ($userTask->task_id == $task->id)
                    <a href="{{ asset('storage/' . $userTask->file) }}" download>{{ $userTask->file }}</a><br>
                @endif
            @endforeach
          </td>
          <td>
            @if (isset($taskUsers[$task->id]) && $taskUsers[$task->id]->isNotEmpty())
                @foreach ($taskUsers[$task->id] as $user)
                    <a href="/users/{{ $user->id }}" class="text-black text-decoration-none">{{ $user->name }}</a>
                    @can('owner')
                      <form action="/user-task/{{ $user->id }}?task={{ $task->id }}&user={{ $user->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?');" type="submit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                        </button>
                      </form>
                    @endcan
                    <br>
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
            @can('staff')
              <a href="/user-task/file/{{ $task->id }}" class="edit-task-btn"><ion-icon name="document-outline" style="color: white;"></ion-icon></a>
            @endcan
            <a href="/tasks/{{ $task->id }}/edit" class="edit-task-btn" style="background-color: yellow; margin-right:5px;">
              <ion-icon name="create-outline" style="color: black;"></ion-icon>
            </a>
            @can('owner')    
            <form action="/tasks/{{ $task->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?');" type="submit">
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
      @if (isset($tasks) && $tasks->isNotEmpty() && $tasks->first()->id_project)
        <a href="/suggestions/create?id_project={{ $tasks->first()->id_project }}" class="button-link">Add suggestion</a>
      @endif

    @endcan

    @can('owner')
        <a href="/suggestions/{{ $task->id_project }}?id_project={{ $task->id_project }}" class="button-link">Suggestions</a>
    @endcan

    <script>
      @foreach ($tasks as $task)
        var slider = document.getElementById("status{{ $task->id }}");
        var value = slider.value;
        if (value < 25) {
          slider.style.background = 'red';
        } else if (value < 75) {
          slider.style.background = 'yellow';
        } else {
          slider.style.background = 'green';
        }
      @endforeach
    </script>
@endsection