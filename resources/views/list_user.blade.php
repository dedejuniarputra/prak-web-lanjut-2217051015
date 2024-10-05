@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #a2d5f2;
    }
</style>
<div class="container mt-4">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-secondary">
                <tr>
                    <th scope="col"><b>ID</b></th>
                    <th scope="col"><b>Nama</b></th>
                    <th scope="col"><b>NPM</b></th>
                    <th scope="col"><b>Kelas</b></th>
                    <th scope="col"><b>Aksi</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['nama'] }}</td>
                    <td>{{ $user['npm'] }}</td>
                    <td>{{ $user['nama_kelas'] }}</td>
                    <td>
                        <!-- Add action buttons if needed -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection