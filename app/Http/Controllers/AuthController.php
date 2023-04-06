<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Hash;

class AuthController extends Controller
{

   public function login() {

    if (auth()->check()) {
        return redirect('/');
    } else {
        return view('auth.login');
    }

   }

   public function authenticate(Request $request){

        //  mengambil data inputan dari form login //
        $credentials = $request->only('email', 'password');

        // memeriksa apakah kombinasi email dan password pada $credentials cocok dengan data pada database. //
        if(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return redirect('login')->with('error_message', 'Coba Lagi');
        }

   }

   public function logout() {

        // menghapus semua data yang disimpan dalam sesi, termasuk status autentikasi pengguna. //
        session::flush();
        // proses logout atau keluar dari sistem dengan membatalkan sesi yang terautentikasi dan menghapus data pengguna dari sesi. //
        Auth::logout();

        return redirect('login');

    }

    public function register_form() {


        if(Auth()->check()){
            return redirect('/');
        } else {
        return view('auth.register');
        }
        
    }

    public function register(Request $request) {

        // melakukan validasi pada data input yang masuk dari form register. //
        $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:10|confirmed',
        ]);

        //  proses pendaftaran user baru , menyimpan data tersebut ke dalam tabel 'users' menggunakan method create() pada model User. //
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('login');

    }



}
