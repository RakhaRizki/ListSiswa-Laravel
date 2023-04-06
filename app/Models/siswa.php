<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    //  array yang berisi nama-nama kolom yang diizinkan untuk diisi oleh user pada saat membuat atau mengupdate data. //
     protected $fillable = [
        'nama',
        'kelas',
    ];

    // mengatur nama tabel pada model siswa , Mengubah nama tabel siswas menjadi tabel siswa //
    protected $table = 'siswa';

    // Local Query Scope , memilih data  // 
    public function scopeSelectById($query, $id) {
        return $query -> where('id', $id);
    }

}
