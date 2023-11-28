@extends('usertasks.layouts.main')

@section('container')
<script>
  var alertMessage = "{{ session('alert') }}";
  if (alertMessage) {
      alert(alertMessage);
  }
</script>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah file untuk task {{ $task->nama_task }}, user: {{ auth()->user()->name }}</h1>
    </div>   
    
    <div class="col-lg-8">
        <form action="/file" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="id_project" value="{{ $task->id_project }}">
            <input type="file" name="file">
            
            <button type="submit" class="btn btn-primary">Tambah File</button>
        </form>
    </div>
@endsection