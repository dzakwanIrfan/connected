@extends('workbench.layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col col-10">
            <table class="table table-sm">
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
        </div>
        <div class="col col-10">
            <a href="/projects/{{ $suggest->project_id }}/tasks">Kembali</a>
        </div>
    </div>
@endsection