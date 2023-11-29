@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <h1 class="page-title">{{ $user->name }} Profile</h1>
        <hr>
        <div class="sub-container">
            <div class="container-foto">
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="foto_profile" class="img-card"> 
                @else
                    <img src="https://source.unsplash.com/1200x400?profil" alt="" class="img-card">
                @endif
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
        @can('staff')    
            <a href="/workbench" class="button-back">Kembali</a>
        @endcan
        @can('owner')
            <a href="/users" class="button-back">Kembali</a>
        @endcan
    </div>
@endsection
