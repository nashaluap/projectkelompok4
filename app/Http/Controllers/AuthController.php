<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\M_Pelanggan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
     // Tampilkan halaman login
     public function showLogin()
     {
         return view('v_login'); // pastikan file login.blade.php sesuai
     }
 
     // Proses login
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
            
               // Redirect berdasarkan role
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        } elseif (Auth::user()->role === 'pelanggan') {
            return redirect('/dashboard/pelanggan'); // arahkan ke dashboard pelanggan
        } else {
            return redirect('/index');
        }
         }
 
         return back()->withErrors([
             'email' => 'Email atau password salah.',
         ]);
     }

     public function showAdminOnlyRegister()
    {
    return redirect('/index')->with('success', 'Akun admin berhasil dibuat.');
    }

    public function storeAdminOnlyRegister(Request $request)
    {
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'admin', // langsung set role sebagai admin
    ]);

    return redirect('/admin/dashboard')->with('success', 'Akun admin berhasil dibuat.');
    }
 
     // Tampilkan halaman register
     public function showRegister()
     {
         return view('v_register');
     }
 
     // Proses register
     public function storeRegister(Request $request)
     {

         $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
         ]);
 
        $user = User::create([
             'name' => $request->nama,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'role' => 'pelanggan', 
         ]);

            // Generate ID pelanggan otomatis
        $last = DB::table('tb_pelanggan1')->orderByDesc('id_pelanggan')->first();
        if ($last) {
            $number = (int) substr($last->id_pelanggan, 2) + 1;
            $id_pelanggan = 'PG' . str_pad($number, 4, '0', STR_PAD_LEFT);
        } else {
            $id_pelanggan = 'PG0001';
        }

        // Simpan ke tabel pelanggan
        DB::table('tb_pelanggan1')->insert([
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'id_user' => $user->id,
        ]);
    
         return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
     }
    
     // Logout
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return redirect('/login');
     }
}
