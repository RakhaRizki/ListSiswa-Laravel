@extends('layouts.app')

@section('title', 'login')
@section('content')

<!-- | Method POST | mengirimkan data ke server untuk memperbarui data tertentu. -->
 <form method="POST" action="{{ url("/$siswa->id") }}" >
  @method('PATCH')
  <!-- CSRF digunakan untuk memastikan bahwa permintaan yang diterima oleh server berasal dari sumber yang sah. -->
  @csrf 

        <h1 class="text-center my-5">Edit</h1>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name='nama' value=" {{ $siswa->nama }} " required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" id="kelas" name='kelas' value=" {{ $siswa->kelas }} " required>
                </div>
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-outline-primary">simpan</button>
            <a href="{{url('/')}}" class= "btn btn-outline-danger">kembali</a>

          </form>
        </div>

@endsection