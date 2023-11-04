@extends('workbench.layouts.main')

@section('container')
    <div class="col col-lg-12 mt-5"><h1>Halo, {{ $user->name }}</h1></div>
    @can('staff')    
        <a href="/workbench" class="btn btn-dark text-decoration-none mt-2">Kembali</a>
    @endcan
    @can('owner')
        <a href="{{ url()->previous() }}" class="btn btn-dark text-decoration-none mt-2">Kembali</a>
    @endcan
    <div class="row justify-content-center mt-3">
        <div class="col col-2">
            <img src="https://source.unsplash.com/500x500?profile" class="img-fluid img-thumbnail">
            @can('edit-profile', $user->id)
                <a href="/users/{{ $user->id }}/edit" class="badge bg-primary text-decoration-none mt-2">edit</a>
            @endcan
        </div>
        <div class="col col-10">
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
@endsection