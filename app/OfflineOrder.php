<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfflineOrder extends Model
{
    //
    protected $fillable = ['tanggalPemesanan','start','end','lapangan_id','status','catatan','namaPemesan','nomorTelepon','totalSewa'];
    protected $table = 'offlineorders';

    public function Lapangan(){
      return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }
}
