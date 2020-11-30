<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawals extends Model
{
    //
    protected $fillable = ['tanggal_pengajuan, kredit, saldo_terakhir, tanggal_pencairan, status, bukti, admin_id, mitra_id','bank','atas_nama','nomor_rekening'];
    protected $table = 'withdrawals';
    public $timestamps = false;
}
