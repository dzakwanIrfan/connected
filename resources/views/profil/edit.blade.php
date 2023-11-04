@extends('workbench.layouts.main')

@section('container')
    <div class="col col-lg-12 mt-5"><h1>Halo, {{ $user->name }}</h1></div>
    <div class="row justify-content-center mt-3">
        <div class="col col-2">
            <img src="https://source.unsplash.com/500x500?profile" class="img-fluid img-thumbnail">
        </div>
        <div class="col col-10">
            <form action="/users/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                <table class="table table-sm">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="name" value="{{ old('name', $user->name) }}"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" value="{{ old('email', $user->email) }}"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" value="" placeholder="New password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary">Edit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection