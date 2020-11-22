<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tempat extends Model
{
    //
    protected $fillable = ['namaTempat','alamat','user_id'];
    protected $table = 'tempat';

    public function Lapangan(){
      return $this->hasMany(Lapangan::class);
    }
}
