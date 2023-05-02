<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // pengecekan apakah pengguna saat ini telah login atau belum //
          if(!Auth::check()){
            return redirect('login');
        }

        //  mengambil seluruh data yang ada pada tabel siswa. //
        $data = siswa::get();

        // mengirim data siswa ke halaman view. //
        $siswa = [
           'siswa' => $data,
        ];

        return view('posts.index', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          if(!Auth::check()){
            return redirect('login');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
          if(!Auth::check()){
            return redirect('login');
        }

        //  // mengambil nilai dari input 'nama' dan 'kelas' yang dikirimkan oleh user melalui form //
        //   $nama = $request ->input('nama');
        //   $kelas = $request ->input('kelas');

          // membuat record baru pada tabel siswa pada database dengan data yang diberikan. //
          siswa::create ([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
          ]);

          return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          if(!Auth::check()){
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          if(!Auth::check()){
            return redirect('login');
        }

        // mengambil data siswa dari tabel siswa pada database berdasarkan id tertentu. //
        $data_siswa = siswa::where('id', $id)->first();

        // menyiapkan data yang akan dikirimkan ke view untuk ditampilkan. //
        $data  = [
          'siswa' => $data_siswa
        ];

        return view('posts.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          if(!Auth::check()){
            return redirect('login');
        }

        // mengambil nilai dari input 'nama' dan 'kelas' yang dikirimkan oleh user melalui form //
        $nama = $request->input('nama');
        $kelas = $request->input('kelas');

        // meng-update data pada tabel siswa pada database. //
        siswa::where('id', $id)->update([
            'nama' => $nama,
            'kelas' => $kelas
        ]);

        return redirect("/");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if(!Auth::check()){
            return redirect('login');
        }   

        siswa::SelectById($id)->delete();

        return redirect('/');

    }
}
