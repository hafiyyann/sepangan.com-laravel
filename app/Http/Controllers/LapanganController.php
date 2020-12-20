<?php

namespace App\Http\Controllers;

use Auth;
use App\Lapangan;
use App\tempat;
use App\User;


use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat = tempat::where('user_id',auth()->user()->id)->pluck('id');
        $data_lapangan = Lapangan::where('tempat_id',$tempat)->get();
        // dd($data_lapangan);
        return view('adminTempat.daftarLapangan', compact('data_lapangan'));
    }

    public function index_admin(){
      $data_tempat = tempat::all();
      $data_lapangan = Lapangan::all();

      return view('superadmin.daftarLapangan', compact('data_lapangan','data_tempat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminTempat.tambahLapangan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //   'nama'            => 'required',
        //   'jenis_olahraga'  => 'required',
        //   'jenis_lapangan'  => 'required',
        //   'sewa'            => 'required|max:7',
        //   'gambar'          => 'required|image',
        //   'status'          => 'required',
        //   'sewa'            => 'required|numeric|digits_between:1,7',
        //   'gambar.image'    => 'File harus berbentuk gambar',
        // ]);

        $this->validate($request, [
          'nama'            => 'required',
          'jenis_olahraga'  => 'required',
          'jenis_lapangan'  => 'required',
          'gambar'          => 'image|required|max:2000',
          'status'          => 'required',
          'sewa'            => 'required|numeric|digits_between:1,7',
        ],[
          'gambar.max'               => "Ukuran file tidak boleh lebih dari 2MB",
          'nama.required'            => "Nama tidak boleh kosong!",
          'jenis_olahraga.required'  => "Silahkan pilih jenis olahraga terlebih dahulu!",
          'jenis_lapangan.required'  => "Silahkan pilih jenis lapangan terlebih dahulu!",
          'sewa.required'            => "Harga Sewa Lapangan tidak boleh kosong!",
          'gambar.required'          => "Silahkan upload file gambar lapangan terlebih dahulu!",
          'gambar.image'             => "Tipe file tidak valid. Anda harus mengunggah file berbentuk gambar!",
          'sewa.digits_between'      => "Harga yang anda masukkan tidak boleh melebihi 7 digit!",
          'sewa.numeric'             => "Harga harus berupa angka!",
          'status.required'          => "Silahkan pilih status lapangan terlebih dahulu!"
        ]);

        if($request->hasFile('gambar')){
          $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
        }


        $user_id = auth()->user()->id;
        $tempat = tempat::where('user_id', $user_id)->first();

        $lapangan = new Lapangan;
        $lapangan->nama = $request->nama;
        $lapangan->jenis_olahraga = $request->jenis_olahraga;
        $lapangan->jenis_lapangan = $request->jenis_lapangan;
        $lapangan->sewa = $request->sewa;
        $lapangan->gambar = $request->file('gambar')->getClientOriginalName();
        $lapangan->status = $request->status;
        $lapangan->tempat_id = $tempat->id;
        $lapangan->save();

        // Lapangan::create([
        //   'nama' => $request->nama,
        //   'jenis_olahraga' => $request->jenis_olahraga,
        //   'jenis_lapangan'=> $request->jenis_lapangan,
        //   'sewa' => $request->sewa,
        //   'gambar' => $request->file('gambar')->getClientOriginalName(),
        //   'id_tempat' => $id_tempat->id
        // ]);
        //
        return redirect('/mitra/lapangan')->with('success','Data lapangan berhasil ditambahkan!');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $Lapangan)
    {
        $data_lapangan = $Lapangan;
        // dd($data_lapangan);
        return view('adminTempat.detailLapangan',compact('data_lapangan'));
    }

    public function show_detail_admin(Lapangan $Lapangan){
        $data_lapangan = $Lapangan;
        $data_tempat = tempat::where('id',$data_lapangan->tempat_id)->first();

        return view('superadmin.detailLapangan', compact('data_lapangan', 'data_tempat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapangan $Lapangan)
    {
      $data_lapangan = $Lapangan;
      return view('adminTempat.ubahLapangan',compact('data_lapangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapangan $Lapangan)
    {
      $this->validate($request, [
        'nama'            => 'required',
        'jenis_olahraga'  => 'required',
        'jenis_lapangan'  => 'required',
        'status'          => 'required',
        'sewa'            => 'required|numeric|digits_between:1,7',
      ],[
        'nama.required'            => "Nama tidak boleh kosong!",
        'jenis_olahraga.required'  => "Silahkan pilih jenis olahraga terlebih dahulu!",
        'jenis_lapangan.required'  => "Silahkan pilih jenis lapangan terlebih dahulu!",
        'sewa.required'            => "Harga Sewa Lapangan tidak boleh kosong!",
        'sewa.digits_between'      => "Harga yang anda masukkan tidak boleh melebihi 7 digit!",
        'sewa.numeric'             => "Harga harus berupa angka!",
        'status.required'          => "Silahkan pilih status lapangan terlebih dahulu!"
      ]);

        $data_lapangan = $Lapangan;
        $data_lapangan->nama = $request->nama;
        $data_lapangan->jenis_olahraga = $request->jenis_olahraga;
        $data_lapangan->jenis_lapangan = $request->jenis_lapangan;
        $data_lapangan->sewa = $request->sewa;
        $data_lapangan->status = $request->status;
        $data_lapangan->update();

        if($request->hasFile('gambar')){
          $this->validate($request,[
            'gambar'          => 'image|required|max:2000',
          ],[
            'gambar.required'          => "Silahkan upload file gambar lapangan terlebih dahulu!",
            'gambar.image'             => "Tipe file tidak valid. Anda harus mengunggah file berbentuk gambar!",
            'gambar.max'               => "Ukuran file tidak boleh lebih dari 2MB"
          ]);
          $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
          $data_lapangan->gambar = $request->file('gambar')->getClientOriginalName();
          $data_lapangan->update();
        }

        return redirect('/mitra/lapangan/'.$Lapangan->id.'/lihat')->with('success','Data lapangan berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $Lapangan)
    {
        $data_lapangan = $Lapangan;
        $data_lapangan->delete($data_lapangan);
        return redirect('/mitra/lapangan')->with('success','Data berhasil dihapus');
    }
}
