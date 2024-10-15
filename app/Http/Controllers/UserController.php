<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserControllerRequest;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        $kelasModel = new Kelas();

        // Mengambil data kelas menggunakan method getKelas
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //Validasi untuk foto
        ]);
        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $foto_name = $foto->hashName();
            $fotoPath = $foto->move(('upload/img'), $foto_name);
        } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
        }
        // Menyimpan data ke database termasuk path foto
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
        ]);
        return redirect()->to('/user')->with('success', 'User
    berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile', $data);
    }
}
