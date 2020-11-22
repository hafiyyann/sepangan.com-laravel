<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\tempat;
use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLogin(){
      return view('auth.login');
    }

    public function login(Request $request){
      $request->validate([
        'email' => 'required',
        'password' => 'required|min:8|max:12',
      ]);

      if(Auth::attempt($request->only('email','password','is_verified'))){
        if (auth()->user()->role == 'pengguna' && auth()->user()->is_verified == 1) {
          return redirect()->intended('/');
        } elseif (auth()->user()->role == 'admin_tempat' && auth()->user()->is_verified == 1) {
          return redirect('/mitra/dashboard');
        } elseif (auth()->user()->role == 'superadmin' && auth()->user()->is_verified == 1) {
          return redirect('/admin/dashboard');
        } elseif ('is_verified' == 0) {
          return back()->withInput()->with('fail','Email anda belum diverifikasi. Silahkan verifikasi email anda terlebih dahulu');
        }
      }

      return back()->withInput()->with('fail','Akun anda tidak ditemukan. Silahkan mendaftar!');
    }

    public function register(Request $request)
    {
        $request->validate([
          'name'=> 'required',
          'email' => 'required',
          'password' => 'required|min:8|max:12',
          'nomorTelepon' => 'required|max:13',
          'password2' => 'required|same:password'
        ]);

        if (User::where('email',$request->email)->exists()) {
          return back()->withInput()->with('fail','Email sudah terdaftar! Silahkan login');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'pengguna';
        $user->nomorTelepon = $request->nomorTelepon;
        $user->remember_token = str_random(60);
        $user->verification_code = sha1(time());
        $user->is_verified = 0;
        $user->save();

        if($request->email != null){
      		MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
          return redirect('/login')->with('success','Email verifikasi sukses dikirim. Silahkan cek email anda untuk konfirmasi akun!');

        } else{
          return redirect('/login')->with('fail','Email verifikasi gagal dikirim. Silahkan coba kembali..');
        }
    }

    public function verifyUser(){
      $verification_code = \Illuminate\Support\Facades\Request::get('code');
      $user = User::where('verification_code', $verification_code)->first();
      if($user!=null){
        $user->is_verified = 1;
        $user->save();
        return redirect('/login')->with('success','Akun anda berhasil terverifikasi. Silahkan login!');
      } else{
        return redirect('/login')->with('fail','Kode Verifikasi tidak ditemukan. Silahkan mendaftar kembali!');
      }
    }

    public function showRegister(){
      return view('auth.register');
    }

    public function showRegisterMitra(){
      return view('auth.registerMitra');
    }

    public function registerMitra(Request $request){
      $request->validate([
        'name'          => 'required',
        'namaTempat'    => 'required',
        'email'         => 'required',
        'alamat'        => 'required',
        'nomorTelepon'  => 'required|max:13',
        'password'      => 'required|min:8|max:12',
        'password2'     => 'required|same:password'
      ]);

      if (User::where('email',$request->email)->exists()) {
        return back()->withInput()->with('fail','Email sudah terdaftar! Silahkan login');
      }

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role = 'admin_tempat';
      $user->nomorTelepon = $request->nomorTelepon;
      $user->remember_token = str_random(60);
      $user->verification_code = sha1(time());
      $user->is_verified = 0;
      $user->save();

      tempat::create([
        'namaTempat'  => $request['namaTempat'],
        'alamat'      => $request['alamat'],
        'user_id'     => $user->id
      ]);

      if($request->email != null){
        MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
        return redirect('/login')->with('success','Email verifikasi sukses dikirim. Silahkan cek email anda untuk konfirmasi akun!');

      } else{
        return redirect('/login')->with('fail','Email verifikasi gagal dikirim. Silahkan coba kembali..');
      }
    }

    public function logout(){
      Auth::logout();
      return redirect('/login');
    }
}
