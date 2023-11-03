@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah pekerja untuk task {{ $task->nama_task }}</h1>
    </div>   
    
    <div class="col-lg-8">
        <form action="/user-task" method="post">
            @csrf
            <label for="user" class="mb-2 label">Pekerja</label>
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="id_project" value="{{ $task->id_project }}">
            <select name="user_id" class="form-select mb-2">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Tambah pekerja</button>
        </form>
    </div>
@endsection