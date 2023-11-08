@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <div class="sub-title"><h1>{{ $user->name }} Profile</h1></div><hr>
            @can('staff')    
                <a href="/workbench" class="button-back">Kembali</a>
            @endcan
            @can('owner')
                <a href="{{ url()->previous() }}" class="button-back">Kembali</a>
            @endcan
        <div class="sub-container">
            <div class="container-foto">
                <img src="https://source.unsplash.com/500x500?profile" class="img-fluid img-thumbnail">
                @can('edit-profile', $user->id)
                    <a href="/users/{{ $user->id }}/edit" style="display: block">edit</a>
                @endcan
            </div>
            <div class="container-profil">
                <table class="table table-sm">
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