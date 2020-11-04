<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\tempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
      return view('auth.login');
    }

    public function login(Request $request){
      if(Auth::attempt($request->only('email','password'))){
        if (auth()->user()->role == 'pengguna') {
          return redirect('/');
        } elseif (auth()->user()->role == 'admin_tempat') {
          return redirect('/dashboard');
        }
      }

      return redirect('login');
    }

    public function register(Request $request)
    {
        $request->validate([
          'name'=> 'required',
          'email' => 'required',
          'password' => 'required|min:8|max:12',
          'nomorTelepon' => 'required|max:13'
        ]);

        // $messages = [
        //     'name.required' => 'Nama tidak boleh kosong!',
        //     'email.required' => 'Email tidak boleh kosong!',
        //     'password.min:8' => 'Password harus terdiri dari 8-12 karakter',
        //     'password.max:12' => 'Password harus terdiri dari 8-12 karakter',
        //     'password.required' => 'Password tidak boleh kosong!',
        // ];

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'pengguna';
        $user->nomorTelepon = $request->nomorTelepon;
        $user->remember_token = str_random(60);
        $user->save();

        return redirect('/login');
    }

    public function showRegister(){
      return view('auth.register');
    }

    public function showRegisterMitra(){
      return view('auth.registerMitra');
    }

    public function registerMitra(Request $request){
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role = 'admin_tempat';
      $user->nomorTelepon = $request->nomorTelepon;
      $user->remember_token = str_random(60);
      $user->save();

      tempat::create([
        'namaTempat'  => $request['namaTempat'],
        'alamat'      => $request['alamat'],
        'id_user'     => $user->id
      ]);

      return redirect('/login');
    }

    public function logout(){
      Auth::logout();
      return redirect('/login');
    }
}
