<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $fillable = ['nominal','bukti','status','payment_due'];
    protected $table = 'payments';
}
