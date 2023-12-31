@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <h1 class="page-title">Edit <b>{{ $user->name }}</b> Profile</h1>
        <hr>
        @can('staff')    
            <a href="/users/{{ $user->id }}" class="button-back">Kembali</a>
        @endcan
        @can('owner')
            <a href="/users" class="button-back">Kembali</a>
        @endcan
        <div class="sub-container">
            <div class="container-foto">
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="foto_user" class="img-card" id="user-image"> 
                @else
                    <img src="https://source.unsplash.com/1200x400?profil" alt="" class="img-card" id="user-image">
                @endif
            </div>
            <div class="container-profil">
                <form action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="file" id="profile-image-upload" name="image" style="display: none;">
                    <table class="profile-table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="name" value="{{ old('name', $user->name) }}"  class="input" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" value="{{ old('email', $user->email) }}" class="input" required></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="password" value="" placeholder="New password" class="input" required></td>
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

    <script>
        var userImage = document.getElementById('user-image');

        userImage.addEventListener('click', function() {
            document.getElementById('profile-image-upload').click();
        });
      </script>
@endsection


