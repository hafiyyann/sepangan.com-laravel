<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\tempat;
use Illuminate\Support\Facades\Hash;

class profilController extends Controller
{
    //
    public function show_profile_mitra(){
      $user = User::where('id',Auth()->user()->id)->first();
      $tempat = tempat::where('user_id',$user->id)->first();

      return view('adminTempat.profil',compact('user','tempat'));
    }

    public function show_profile_admin(){
      $user = User::where('id',Auth()->user()->id)->first();
      return view('superadmin.profil',compact('user'));
    }

    public function show_profile_pengguna(){
      $user = User::where('id',Auth()->user()->id)->first();
      return view('user.profil',compact('user'));
    }

    public function password_change_pengguna(User $User, Request $request){
      $old_password = $request->input('old_password');
      if (Hash::check($old_password, $User->password)) {
        $User->password = Hash::make($request->password);
        $User->update();
        return redirect('/profil')->with('success','Password anda berhasil dirubah');
      } else {
        return redirect('/profil')->with('fail','Password lama salah. Silahkan coba kembali');
      }
    }

    public function password_change_mitra(User $User, Request $request){
      $old_password = $request->input('old_password');
      if (Hash::check($old_password, $User->password)) {
        $User->password = Hash::make($request->password);
        $User->update();
        return redirect('/mitra/profil')->with('success','Password anda berhasil dirubah');
      } else {
        return redirect('/mitra/profil')->with('fail','Password lama salah. Silahkan coba kembali');
      }
    }

    public function password_change_admin(User $User, Request $request){
      $old_password = $request->input('old_password');
      if (Hash::check($old_password, $User->password)) {
        $User->password = Hash::make($request->password);
        $User->update();
        return redirect('/admin/profil')->with('success','Password anda berhasil dirubah');
      } else {
        return redirect('/admin/profil')->with('fail','Password lama salah. Silahkan coba kembali');
      }
    }
}
