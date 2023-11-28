@extends('dashboard.layouts.main')

@section('container')
<div class="mt-3">
    <div class="mt-3 link-container">
        <a href="/users/create/" class="button-link">Add new User</a>
        <a href="/dashboard" class="button-link">Back to Dashboard</a>
    </div>
    <table class="content-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/users/{{ $user->id }}" class="badge bg-success"><i class="bi bi-eye"></i></a>
                        <a href="/users/{{ $user->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>
                        <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?');"><i class="bi bi-x-circle"></i></button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>
</div>
@endsection