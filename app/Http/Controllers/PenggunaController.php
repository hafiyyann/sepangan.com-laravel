<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    //
    public function show_user_list(){
      $data_user = User::where('role','pengguna')->get();

      return view('superadmin.daftarPengguna',compact('data_user'));
    }

    public function show_user_detail(User $User){
      $data_user = $User;

      return view('superadmin.detailPengguna',compact('data_user'));
    }
}
