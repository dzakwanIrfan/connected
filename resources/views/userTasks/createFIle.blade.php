@extends('usertasks.layouts.main')

@section('container')
<script>
  var alertMessage = "{{ session('alert') }}";
  if (alertMessage) {
      alert(alertMessage);
  }
</script>
    <div class="container">
        <h1>Tambah file untuk task {{ $task->nama_task }} | User: {{ auth()->user()->name }}</h1>
        <form action="/file" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="id_project" value="{{ $task->id_project }}">
            <input type="file" name="file">
            
            <button type="submit" class="btn btn-primary">Tambah file</button>
        </form>
    </div>
@endsection