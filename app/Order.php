<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $fillable = ['tanggalPemesanan','start','end','lapangan_id','user_id','status','catatan','payments_id'];
    protected $table = 'orders';

    public function Lapangan(){
      return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }

    public function User(){
      return $this->belongsTo(User::class, 'user_id');
    }

    public function payment(){
      return $this->belongsTo(payment::class, 'payments_id');
    }

}
