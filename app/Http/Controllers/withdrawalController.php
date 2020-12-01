<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\withdrawals;
use App\tempat;
use Carbon\Carbon;

class withdrawalController extends Controller
{
    //
    public function index(){
      $saldo = tempat::where('user_id',Auth()->user()->id)->value('saldo');
      $tempat = tempat::where('user_id',Auth()->user()->id)->first();
      $withdrawals = withdrawals::where('mitra_id',$tempat->id)->get();

      return view('adminTempat.pencairan')->with(compact('saldo','withdrawals'));
    }

    public function index_admin(){
      $withdrawals = withdrawals::all();

      return view('superadmin.pencairan')->with(compact('withdrawals'));
    }

    public function submit_withdrawal_form(Request $request){
      $tempat = tempat::where('user_id',Auth()->user()->id)->first();

      if($request->input_kredit <= $tempat->saldo){
        $withdrawal_data = new withdrawals;
        $withdrawal_data->tanggal_pengajuan = Carbon::now();
        $withdrawal_data->kredit = $request->input_kredit;
        $withdrawal_data->status = 'diproses';
        $withdrawal_data->bank = $request->input_bank;
        $withdrawal_data->nomor_rekening = $request->input_nomor_rekening;
        $withdrawal_data->atas_nama = $request->input_atas_nama;
        $withdrawal_data->mitra_id = $tempat->id;
        $withdrawal_data->save();

        $tempat->saldo = $tempat->saldo - $withdrawal_data->kredit;
        $tempat->update();

        return redirect('/mitra/withdrawal')->with('success','Pengajuan pencairan dana anda sedang diproses. Terima Kasih');
      } else {
        return redirect('/mitra/withdrawal')->with('fail','Saldo anda tidak mencukupi!');
      }

    }

    public function show_withdrawal_form(){
      $tempat = tempat::where('user_id',Auth()->user()->id)->first();

      return view('adminTempat.formPencairan',compact('tempat'));
    }

    public function show_detail_mitra(){
      $tempat = tempat::where('user_id',Auth()->user()->id)->first();
      $withdrawal_data = withdrawals::where('mitra_id',$tempat->id)->first();

      return view('adminTempat.detailPencairan', compact('withdrawal_data','tempat'));
    }

    public function show_detail_admin(withdrawals $withdrawals){
      $withdrawal_data = withdrawals::where('id',$withdrawals->id)->first();

      // return($withdrawal_data);

      return view('superadmin.detailPencairan', compact('withdrawal_data'));
    }

    public function withdrawal_update(Request $request, withdrawals $withdrawals){
      // dd($request->all());
      // dd($request->all());
      if($request->hasFile('bukti')){
        // return('Request have file');
        $request->file('bukti')->move('images/',$request->file('bukti')->getClientOriginalName());
        $withdrawal_data = withdrawals::where('id',$withdrawals->id)->first();
        $withdrawal_data->bukti = $request->file('bukti')->getClientOriginalName();
        $withdrawal_data->status = 'dicairkan';
        $withdrawal_data->update();

        return redirect('/admin/withdrawal');
      }

      return('Request doesnt have file');
    }
}
