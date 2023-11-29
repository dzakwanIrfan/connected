

{{-- @section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add new user</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/users" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"></label>
                <input type="hidden" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="12345">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role">
                    <option value="staff">Staff</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add user</button>
        </form>
    </div>
@endsection --}}

@extends('profil.layouts.main')

@section('container')
    <div class="container">
        <h1 class="page-title">Create New Profile</h1>
        <hr>
        <div class="sub-container">
            <div class="container-foto">
              <img src="https://source.unsplash.com/1200x400?profil" alt="" class="img-card" id="user-image">
            </div>
            <div class="container-profil">
                <form action="/users" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="profile-image-upload" name="image" style="display: none;">
                    <table class="profile-table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="name" class="input" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" class="input" required></td>
                        </tr>
                        <tr>
                            <td><label for="role" class="form-label">Role</label></td>
                            <td>:</td>
                            <td>
                              <select class="form-select" name="role">
                                <option value="staff">Staff</option>
                                <option value="owner">Owner</option>
                              </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" name="password" value="" placeholder="New password" class="input" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button type="submit" class="edit">Create</button></td>
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


