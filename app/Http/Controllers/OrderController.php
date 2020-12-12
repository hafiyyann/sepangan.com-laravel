<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\Lapangan;
use App\tempat;
use App\User;
use App\payment;
use App\OfflineOrder;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_mitra_online()
    {
        //
        $tempat_id = tempat::where('user_id',auth()->user()->id)->pluck('id')->first();
        $Lapangan_id = Lapangan::where('tempat_id',$tempat_id)->pluck('id');

        $fields = Lapangan::where('tempat_id',$tempat_id)->get();
        $orders = order::whereIn('lapangan_id',$Lapangan_id)->where('status','dibayar')->orWhere('status','dikonfrimasi')->orWhere('status','selesai')->get();
        // return($Lapangan);
        return view('adminTempat.daftarOrder_online', compact('fields','orders'));
    }

    public function index_mitra_offline()
    {
        //
        $tempat_id = tempat::where('user_id',auth()->user()->id)->pluck('id')->first();
        $Lapangan_id = Lapangan::where('tempat_id',$tempat_id)->pluck('id');

        $fields = Lapangan::where('tempat_id',$tempat_id)->get();
        $OfflineOrders = OfflineOrder::whereIn('lapangan_id',$Lapangan_id)->get();
        // return($Lapangan);
        return view('adminTempat.daftarOrder_offline', compact('fields','OfflineOrders'));
    }

    public function index_superadmin(){
      $fields = Lapangan::all();
      $orders = order::all();

      return view('superadmin.daftarOrder', compact('fields','orders'));
    }

    // public function status_filter(Request $request){
    //   if (request()->ajax()) {
    //     if ($request->status) {
    //       $orders = order::where('status', $request->status)->get();
    //       $fields = Lapangan::all();
    //     } else {
    //       $fields = Lapangan::all();
    //       $orders = order::all();
    //     }
    //
    //     return datatables()->of($orders,$fields)->make(true);
    //   }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tempat_id = tempat::where('user_id',auth()->user()->id)->pluck('id')->first();
        $fields = Lapangan::where('tempat_id',$tempat_id)->get();
        return view('adminTempat.tambahOrder', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'nama'          => 'required',
          'nomorTelepon'  => 'required',
          'lapangan'      => 'required',
          'tanggal'       => 'required',
          'start'         => 'required',
          'end'           => 'required',
          'sewa'          => 'required'
        ]);

        $OfflineOrder = new OfflineOrder;
        $OfflineOrder->namaPemesan = $request->nama;
        $OfflineOrder->nomorTelepon = $request->nomorTelepon;
        $OfflineOrder->lapangan_id = $request->lapangan;
        $OfflineOrder->tanggalPemesanan = $request->tanggal;
        $OfflineOrder->start = $request->start;
        $OfflineOrder->end = $request->end;
        $OfflineOrder->catatan = $request->catatan;
        $OfflineOrder->totalSewa = $request->sewa;
        $OfflineOrder->status = 'dibuat';
        $OfflineOrder->save();

        return redirect('/mitra/Orders/Offline')->with('success','Order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_order_detail_mitra(order $order)
    {
        $data_pemesan = User::where('id',$order->user_id)->first();
        $data_lapangan = Lapangan::where('id',$order->lapangan_id)->first();
        $data_pembayaran = payment::where('id',$order->payments_id)->first();

        return view('adminTempat.detailOrder')->with(compact('order','data_pemesan','data_lapangan','data_pembayaran'));
    }

    public function show_offline_order_detail_mitra(OfflineOrder $OfflineOrder)
    {
        $data_lapangan = Lapangan::where('id',$OfflineOrder->lapangan_id)->first();
        $order = $OfflineOrder;

        return view('adminTempat.detailOrder_offline')->with(compact('order','data_lapangan'));
    }

    public function show_order_detail_admin(order $order)
    {
        $data_pemesan = User::where('id',$order->user_id)->first();
        $data_lapangan = Lapangan::where('id',$order->lapangan_id)->first();
        $data_pembayaran = payment::where('id',$order->payments_id)->first();

        return view('superadmin.detailOrder')->with(compact('order','data_pemesan','data_lapangan','data_pembayaran'));
    }

    public function payment_status_change(Request $request, order $order){
        // return($request->all());
        $payment = payment::where('id', $order->payments_id)->first();
        $payment->status = Str::lower($request->payment_status);
        // return($payment->status);
        $payment->update();

        if ($payment->status == 'dibayar') {
          $order->status = 'dibayar';
          $order->update();
        }

        return redirect('/admin/Orders');
    }

    public function order_status_done(order $order){
      $order_status = Str::lower($request->status);

      if ($order_status = 'dibayar') {
        $order->status = 'selesai';
        $order->update();
        return redirect('/mitra/Orders/Online')->with('success','status berhasil dirubah!');
      } else {
        return redirect('/mitra/Orders/Online')->with('fail','status gagal dirubah!');
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
