<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function show_dashboard_mitra(){
      

      return view('adminTempat.index');
    }

    public function show_dashboard_superadmin(){
      return view('superadmin.index');
    }
}
