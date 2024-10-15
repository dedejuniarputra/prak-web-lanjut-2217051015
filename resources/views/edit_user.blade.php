@extends('layouts.app')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modul 3</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #a2d5f2;
                margin: 0;
                height: 110vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card {
                display: flex;
                flex-direction: column;
                align-items: center;
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                width: 400px;
                max-width: 100%;
                padding: 20px;
            }

            .card img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 20px;
            }

            .form-container {
                width: 100%;
                text-align: center;
            }

            label {
                display: block;
                font-weight: 500;
                margin-top: 10px;
                color: #333;
                text-align: left;
            }

            input[type="text"],
            select {
                width: 80%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 15px;
                border-radius: 5px;
                border: 1px solid #ccc;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                font-size: 14px;
            }

            input[type="submit"] {
                background-color: #0d6efd;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #094ca1;
            }

            .text-danger {
                color: #ff0000;
                font-size: 12px;
                margin-top: -10px;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div class="card">
            <img src="{{ asset('img/background.jpeg') }}" alt="Foto Profil">

            <div class="form-container">
                <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama"
                        value = "{{ old('nama', $user->nama) }}">
                    @foreach ($errors->get('nama') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach

                    <label for="npm">NPM:</label>
                    <input type="text" id="npm" name="npm" placeholder="Masukkan NPM"
                        value = "{{ old('nama', $user->npm) }}">
                    @foreach ($errors->get('npm') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach

                    <label for="id_kelas">Kelas :</label>
                    <select name="kelas_id" id="kelas_id" required>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                                {{ $kelasItem->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    <label for="foto">Foto : </label>
                    <input type="file" id="foto" name="foto"><br><br>
                    @if ($user->foto)
                        <img src="{{ asset('storage/uploads/' . $user->foto) }}" class="card-img-top" alt="Foto Profil">
                    @endif
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection