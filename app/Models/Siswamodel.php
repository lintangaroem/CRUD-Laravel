<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswamodel extends Model
{
    protected $table = 'siswa';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = ['nama_siswa','tanggal_lahir','gender','alamat','id_kelas'];
}

?>
