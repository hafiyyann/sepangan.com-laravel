<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $fillable = ['tanggalPemesanan','start','end','id_lapangan','id_user','status','catatan','payments_id'];
    protected $table = 'orders';

    public function Lapangan(){
      return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }
}
