@extends('dashboard.layouts.main')

@section('container')
<div class="mt-3">
    <div class="mt-3 link-container">
        <a href="/dashboard" class="button-link back">Back to Dashboard</a>
        <a href="/users/create/" class="button-link">Add new User</a>
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
                    <td style="display: flex; gap: 5px">
                        <a href="/users/{{ $user->id }}" class="badge bg-success" style="color: black; background-color: green; padding: 5px; border-radius: 5px"><ion-icon name="eye-outline"></ion-icon></a>
                        <a href="/users/{{ $user->id }}/edit" class="badge bg-warning"><ion-icon name="create-outline" style="color: black; background-color: yellow; padding: 5px; border-radius: 5px"></ion-icon></a>
                        <form action="/users/{{ $user->id }}" method="post" class="d-inline" style="display: inline; cursor: pointer;">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?');" style="cursor: pointer; border: none; background-color: red; color: black; padding: 5px; border-radius: 5px"><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>
</div>
@endsection