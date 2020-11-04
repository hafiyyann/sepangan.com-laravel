<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    //
    protected $fillable = ['nama','jenis_olahraga','jenis_lapangan','sewa','gambar', 'id_tempat'];
    protected $table = 'lapangan';
}
