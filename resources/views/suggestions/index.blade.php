@extends('suggestions.layouts.mainadmin')

@section('container')
    <center>
        <h1>Suggestions</h1>
        <hr>
        <table class="content-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User ID</th>
                    <th>Suggestion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $suggest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $suggest->user->name }}</td>
                    <td>{{ $suggest->suggestion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/projects/{{ $suggest->project_id }}/tasks"><p>Back</p></a>
    </center>       
@endsection