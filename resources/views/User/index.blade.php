@extends('dashboard.layouts.main')

@section('container')
<div class="mt-3">
    <a href="/users/create/" class="btn btn-primary mb-3">Add new User</a>
    <a href="/dashboard" class="btn btn-dark mb-3">Back to Dashboard</a>
    <table class="table table-stripped table-sm">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
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