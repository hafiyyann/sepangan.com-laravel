<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    //
    protected $fillable = ['nama','jenis_olahraga','jenis_lapangan','sewa','gambar','status','tempat_id'];
    protected $table = 'lapangan';

    public function tempat(){
      return $this->belongsTo(tempat::class, 'tempat_id');
    }

    public function order(){
      return $this->hasMany(order::class);
    }
}
