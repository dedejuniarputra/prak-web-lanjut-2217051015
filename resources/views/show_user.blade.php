@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <!-- Menempatkan card di tengah layar -->
    <div class="card text-center" style="width: 40rem;">
        @if($user->foto)
        <img src="{{ asset('storage/uploads/' . $user->foto) }}" class="card-img-top" alt="Foto User">
        @else
        <p>Foto tidak tersedia</p>
        @endif
        <div class="card-body p-3 m-3">
            <h5 class="card-title">{{ $user->nama }}</h5>
            <h5 class="card-title">{{ $user->npm }}</h5>
            <h5 class="card-title">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</h5>
            <hr>
            <a href="{{ route('user.list') }}" class="btn btn-primary">Kembali ke List</a>
        </div>
    </div>
</div>
@endsection