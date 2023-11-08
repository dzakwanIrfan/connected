@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <h1 class="page-title">{{ $user->name }} Profile</h1>
        <hr>
        @can('staff')    
            <a href="/workbench" class="button-back">Kembali</a>
        @endcan
        @can('owner')
            <a href="{{ url()->previous() }}" class="button-back">Kembali</a>
        @endcan
        <div class="sub-container">
            <div class="container-foto">
                <img src="https://source.unsplash.com/500x500?profile" class="profile-image">
                @can('edit-profile', $user->id)
                    <a href="/users/{{ $user->id }}/edit" class="edit-link">Edit</a>
                @endcan
            </div>
            <div class="container-profil">
                <table class="profile-table">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
