@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <h1 class="page-title">Edit <b>{{ $user->name }}</b> Profile</h1>
        <hr>
        @can('staff')    
            <a href="/users/{{ $user->id }}" class="button-back">Kembali</a>
        @endcan
        @can('owner')
            <a href="{{ url()->previous() }}" class="button-back">Kembali</a>
        @endcan
        <div class="sub-container">
            <div class="container-foto">
                <img src="https://source.unsplash.com/500x500?profile" class="profile-image">
            </div>
            <div class="container-profil">
                <form action="/users/{{ $user->id }}" method="post">
                    @method('put')
                    @csrf
                    <table class="profile-table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="name" value="{{ old('name', $user->name) }}"  class="input"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" value="{{ old('email', $user->email) }}" class="input"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="password" value="" placeholder="New password" class="input"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button type="submit" class="edit">Edit</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
