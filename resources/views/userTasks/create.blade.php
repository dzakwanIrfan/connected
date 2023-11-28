@extends('usertasks.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah pekerja untuk task {{ $task->nama_task }}</h1>
    </div>   
    
    <div class="col-lg-8">
        <form action="/user-task" method="post">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="hidden" name="id_project" value="{{ $task->id_project }}">
            @foreach ($users as $user)
                <input type="checkbox" id="{{ $user->name }}" name="user_id[]" value="{{ $user->id }}">
                <label for="{{ $user->name }}">{{ $user->name }}</label><br>
            @endforeach
            
            <button type="submit" class="btn btn-primary">Tambah pekerja</button>
        </form>
    </div>
@endsection