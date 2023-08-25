<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function index()
    {
        return view("sesi.index");
    }
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return back()->with('loginError', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function create()
    {
        $data = User::all();
        return view('sesi.create', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', // Ubah 'name' menjadi 'nama' sesuai dengan aturan validasi
            'email' => 'email|required|unique:users,email',
            'password' => 'min:8|required', // Hapus 'password' menjadi 'password'
            'role' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new User();
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->password = Hash::make($request->input('password')); 
            $data->role = $request->input('role');
            $data->save();
            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = User::findOrFail($id);
        return view('sesi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 
            'email' => 'email|required|unique:users,email', 
            'password' => 'min:8|required', 
            'role' => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $data = User::findOrFail($id);
            $data->name = $validator->validated()['name'];
            $data->email = $validator->validated()['email'];
            $data->password = Hash::make($validator->validated()['password']);
            $data->role = $validator->validated()['role'];
            $data->save(); // Menggunakan metode "save" untuk menyimpan perubahan
            return response()->json(['success' => true, 'message' => 'Data Berhasil Disimpan']);
        }
    }

}
