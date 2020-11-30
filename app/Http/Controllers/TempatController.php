<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tempat;
use App\User;

class TempatController extends Controller
{
    //

    public function show_place_list(){
      $data_tempat = tempat::all();

      $user_id = tempat::all()->pluck('user_id');
      $data_user = User::whereIn('id',$user_id)->get();

      return view('superadmin.daftarTempat',compact('data_tempat','data_user'));
    }

    public function show_place_detail(tempat $tempat){
      $data_tempat = $tempat;
      $data_user = User::where('id',$data_tempat->user_id)->first();

      return view('superadmin.detailTempat', compact('data_tempat','data_user'));
    }
}
