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
        $tempat = tempat::where('id_user',auth()->user()->id)->pluck('id');
        $data_lapangan = Lapangan::where('tempat_id',$tempat)->get();
        // dd($data_lapangan);
        return view('adminTempat.daftarLapangan', compact('data_lapangan'));
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

        $request->validate([
          'nama'=> 'required',
          'jenis_olahraga' => 'required',
          'jenis_lapangan' => 'required',
          'sewa' => 'required|max:7',
          'gambar' => 'required'
        ]);

        if($request->hasFile('gambar')){
          $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
        }


        $id_user = auth()->user()->id;
        $tempat = tempat::where('id_user', $id_user)->first();

        $lapangan = new Lapangan;
        $lapangan->nama = $request->nama;
        $lapangan->jenis_olahraga = $request->jenis_olahraga;
        $lapangan->jenis_lapangan = $request->jenis_lapangan;
        $lapangan->sewa = $request->sewa;
        $lapangan->gambar = $request->file('gambar')->getClientOriginalName();
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
        $request->validate([
          'nama'=> 'required',
          'jenis_olahraga' => 'required',
          'jenis_lapangan' => 'required',
          'sewa' => 'required|max:5'
        ]);

        $data_lapangan = $Lapangan;
        $data_lapangan->update($request->all());
        if($request->hasFile('gambar')){
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
