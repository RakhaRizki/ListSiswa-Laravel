@extends('layouts.app')

@section('title', 'login')
@section('content')

 <form method="POST" action="{{ url('/') }}">
  @csrf 

        <h1 class="text-center"> Tambah Data </h1>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" name='kelas' id="kelas" required>
                </div>
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-outline-primary">simpan</button>
            <a href="{{url('/')}}" class= "btn btn-outline-danger">kembali</a>

          </form>
        </div>

@endsection