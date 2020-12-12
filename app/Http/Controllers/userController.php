<?php

namespace App\Http\Controllers;

use \App\tempat;
use \App\order;
use \App\Lapangan;
use \App\User;
use \App\payment;
use \App\Article;
use \App\OfflineOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class userController extends Controller
{
    public function index(){
      $Articles = Article::all()->take(8);
      return view('user.index',compact('Articles'));
    }

    public function show_article_detail(Article $Article){
      return view('user.detailArtikel', compact('Article'));
    }

    public function show_article_list(){
      $Articles = Article::all();
      return view('user.daftarArtikel', compact('Articles'));
    }

    public function searchResult(Request $request){

      // query sql
      // SELECT tempat.namaTempat from tempat join lapangan on tempat.id=lapangan.id_tempat where lapangan.id NOT IN(SELECT lapangan.id FROM orders join lapangan on orders.id_lapangan=lapangan.id join tempat on tempat.id=lapangan.id_tempat WHERE orders.tanggalPemesanan = "2020-11-04" and (orders.start <= '14:00' and orders.end >= '16:00') or (orders.start < '14:00' AND orders.end >= '16:00') or ('14:00' <= orders.start AND '16:00' >= orders.end) or (orders.start BETWEEN '14:00' and '16:00') or (orders.end BETWEEN '14:00' and '16:00'))

      //form validation
      $request->validate([
        'start'=> 'required',
        'end' => 'required',
        'tanggal' => 'required',
        'jenis_olahraga' => 'required'
      ]);

      //request declaration
      $start_time = $request->start.':00';
      $end_time = $request->end.':00';
      $date = $request->tanggal;
      $sport_type = $request->jenis_olahraga;

      // put input data into session
      Session::put('booking_date',$date);
      Session::put('start_time',$start_time);
      Session::put('end_time',$end_time);

      // dd($request->all());

      //looking for orders
      $booked_orders = order::whereRaw('orders.tanggalPemesanan = "'.$date.'" and ((orders.start <= "'.$start_time.'" and orders.end >= "'.$end_time.'") or (orders.start < "'.$start_time.'" and orders.end >= "'.$end_time.'") or ("'.$start_time.'" <= orders.start AND "'.$end_time.'" >= orders.end) or (orders.start BETWEEN "'.$start_time.'" and "'.$end_time.'") or (orders.end BETWEEN "'.$start_time.'" and "'.$end_time.'"))')->where('status','!=','expired')->pluck('lapangan_id');

      $booked_offline_orders = OfflineOrder::whereRaw('offlineorders.tanggalPemesanan = "'.$date.'" and ((offlineorders.start <= "'.$start_time.'" and offlineorders.end >= "'.$end_time.'") or (offlineorders.start < "'.$start_time.'" and offlineorders.end >= "'.$end_time.'") or ("'.$start_time.'" <= offlineorders.start AND "'.$end_time.'" >= offlineorders.end) or (offlineorders.start BETWEEN "'.$start_time.'" and "'.$end_time.'") or (offlineorders.end BETWEEN "'.$start_time.'" and "'.$end_time.'"))')->pluck('lapangan_id');

      //looking for available place id
      $available_place_id = Lapangan::whereNotIn('id',$booked_orders)->WhereNotIn('id',$booked_offline_orders)->pluck('tempat_id');

      //looking for available field where id not in orders
      $available_field = Lapangan::whereNotIn('id',$booked_orders)->WhereNotIn('id',$booked_offline_orders)->where('jenis_olahraga',$sport_type)->where('status',1)->pluck('id');

      //get model tempat where id in available place id
      $tempat = tempat::whereIn('id',$available_place_id)->where('status',1)->get();

      return view('user.result',compact('tempat','available_field','date','start_time','end_time'));
    }

    public function resultDetail(Lapangan $Lapangan){
      $data_lapangan = $Lapangan;
      $data_tempat = tempat::where('id',$data_lapangan->tempat_id)->first();
      return view('user.detail',compact('data_lapangan','data_tempat'));
    }

    public function orderConfirmation(Lapangan $Lapangan){
      $data_lapangan = $Lapangan;
      $data_tempat = tempat::where('id',$data_lapangan->tempat_id)->first();
      $data_user = User::where('id',auth()->user()->id)->first();

      //get data from session that inputed in method searchResult
      $date = Session::get('booking_date');
      $start_time = Session::get('start_time');
      $end_time = Session::get('end_time');

      $duration = (new Carbon($start_time))->diff(new Carbon($end_time))->format('%h');
      $nominal = $data_lapangan->sewa * $duration;

      return view('user.konfirmasi-pemesanan',compact('data_lapangan','data_tempat','data_user','date','start_time','end_time','duration','nominal'));
    }

    public function payment(Request $request, Lapangan $Lapangan){

      if (order::where('tanggalPemesanan',Session::get('booking_date'))->where('start',Session::get('start_time'))->where('end',Session::get('end_time'))->where('lapangan_id',$Lapangan->id)->exists()) {
        return back()->withInput()->with('fail','Anda sudah melakukan pemesanan atau orang lain terlebih dahulu melakukan order!');
      } else {
        // create new payment
        $payment = new payment;
        $payment->nominal = $request->nominal;
        $payment->bukti = null;
        $payment->status = 'belum dibayar';
        $payment->payment_due = Carbon::now()->setTimezone('Asia/Jakarta')->addHours(3);
        $payment->save();

        //create new order
        $order = new order;
        $order->tanggalPemesanan = Session::get('booking_date');
        $order->start = Session::get('start_time');
        $order->end = Session::get('end_time');
        $order->lapangan_id = $Lapangan->id;
        $order->user_id = auth()->user()->id;
        $order->status = 'dibuat';
        $order->catatan = $request->catatan;
        $order->payments_id = $payment->id;
        $order->save();

        return redirect('/'.$order->id.'/pembayaran');
      }
    }

    public function showPayment(order $order){
      $data_order = $order;
      $data_pembayaran = payment::where('id',$data_order->payments_id)->first();
      return view('user.pembayaran')->with(compact('data_pembayaran','data_order'));
    }

    public function history(){
      $orders = order::where('user_id',auth()->user()->id)->get();
      $booked_field = order::where('user_id',auth()->user()->id)->pluck('lapangan_id');
      $fields = Lapangan::whereIn('id',$booked_field)->get();
      $place_id = Lapangan::whereIn('id',$booked_field)->pluck('tempat_id');
      $tempat = tempat::whereIn('id',$place_id)->get();
      $payments_id = order::where('user_id',auth()->user()->id)->pluck('payments_id');
      $payments = payment::whereIn('id',$payments_id)->get();

      // dd($tempat);
      return view('user.riwayat',compact('orders','booked_field','fields','tempat','payments'));
    }

    public function orderDetail(order $order){
      $field = Lapangan::where('id',$order->lapangan_id)->first();
      $tempat = tempat::where('id',$field->tempat_id)->first();
      $payment = payment::where('id',$order->payments_id)->first();

      return view('user.detail-order',compact('order','field','tempat','payment'));
    }

    public function payment_file_upload(Request $request, order $order){
      // dd($request->all());
      if($request->hasFile('bukti')){
        // return('Request have file');
        $request->file('bukti')->move('images/',$request->file('bukti')->getClientOriginalName());
        $payment = payment::where('id',$order->payments_id)->first();
        $payment->bukti = $request->file('bukti')->getClientOriginalName();
        $payment->update();

        return redirect('/riwayat/'.$order->id.'/detail');
      }

      return('Request doesnt have file');
    }

    public function order_complete(order $order){
      $data_order = order::where('id',$order->id)->first();
      $data_order->status = 'selesai';
      $data_order->update();

      $id_tempat = lapangan::where('id',$data_order->lapangan_id)->value('tempat_id');
      $data_tempat = tempat::where('id',$id_tempat)->first();
      $payment_data = payment::where('id',$data_order->payments_id)->first();
      $data_tempat->saldo = ($data_tempat->saldo) + ($payment_data->nominal*99/100);
      $data_tempat->update();

      return redirect('/riwayat');
    }

}
