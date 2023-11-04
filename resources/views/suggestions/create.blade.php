@extends('workbench.layouts.main')

@section('container')
    <form action="/suggestions" method="post">
        @csrf
        <input type="text" name="user_id" value="{{ auth()->user()->id }}">
        <input type="text" name="project_id" value="{{ $project }}">
        Suggestions: <textarea name="suggestion" cols="30" rows="10" class="textarea"></textarea>
        <button type="submit">Kirim</button>
    </form>
@endsection