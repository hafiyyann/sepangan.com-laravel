<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tempat extends Model
{
    //
    protected $fillable = ['namaTempat','alamat','id_user'];
    protected $table = 'tempat';
}
