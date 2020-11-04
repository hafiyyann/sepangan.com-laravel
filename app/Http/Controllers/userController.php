<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\tempat;

class userController extends Controller
{
    public function index(){
      return view('user.index');
    }

    public function searchResult(){

      // $nama_tempat = DB::select(`tempat.namaTempat`)
      //                     		->from(`tempat`)
      //                     		->join(`lapangan`, function($join) {
      //                           			$join->on(`tempat.id`, `=`, `lapangan.id_tempat`);
      //                           			})
      //                     		->whereRaw(`lapangan.id NOT IN`, [], `( SELECT lapangan.id FROM orders join lapangan on orders.id_lapangan = lapangan.id join tempat on tempat.id = lapangan.id_tempat WHERE orders.tanggalPemesanan = "2020-11-04" and ( orders.start <= '14:00' and orders.end >= '16:00' ) or ( orders.start < '14:00' AND orders.end >= '16:00' ) or ( '14:00' <= orders.start AND '16:00' >= orders.end ) or ( orders.start BETWEEN '14:00' and '16:00' ) or ( orders.end BETWEEN '14:00' and '16:00' ))`)
      //                     		->get();

      $results = tempat::join('lapangan', 'tempat.id', '=', 'lapangan.id_tempat')->select('tempat.id')->whereNotIn('lapangan.id', function($query){
        $query->select('lapangan.id')->from('orders')->join('lapangan','lapangan.id','=','orders.id_lapangan')->where('orders.tanggalPemesanan','2020-11-05');
        })->get();

      return $results;
    }
}
