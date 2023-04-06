@extends('layouts.app')

@section('title', 'login')
@section('content')
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url("/create") }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-5">Kelas</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @php($number = 1)
                        @foreach ($siswa as $p)
                        <tr>
                            <td> {{ $number }} </td>
                            <td> {{ $p->nama }} </td>
                            <td> {{ $p->kelas }} </td>
                            <td>

                            <!-- Button Hapus dan Button Edit -->
                             <form method="POST" action="{{ url("/$p->id") }}">
                                 @method('DELETE')
                                 @csrf
                             <button type="submit" class="btn btn-outline-danger my-2 "><i class="fa-solid fa-trash"></i></button>
                              <a  href="{{url("/$p->id/edit")}}" class="btn btn-outline-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            </form>

                            </td>
                        @php($number++)
                        @endforeach
                        

                        </tr>
                    </tbody>
                </table>
               
          </div>
          <!-- AKHIR DATA -->
    </main>

@endsection