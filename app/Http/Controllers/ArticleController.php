<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        return view('superadmin.daftarArtikel',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.tambahArtikel');
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

        $this->validate($request, [
          'nama' => 'required',
          'title' => 'required',
          'content' => 'required|max:10000',
          'gambar' => 'image|required|max:10000',
        ],[
          'gambar.max'               => "Ukuran file tidak boleh lebih dari 10MB",
          'nama.required'            => "Nama tidak boleh kosong!",
          'title.required'           => "Judul Artikel tidak boleh kosong!",
          'content.required'         => "Isi Artikel tidak boleh kosong!",
          'content.max'              => "Isi Artikel tidak boleh melebihi 10.000 karakter!",
          'gambar.required'          => "Silahkan upload file gambar terlebih dahulu!",
          'gambar.image'             => "Tipe file tidak valid. Anda harus mengunggah file berbentuk gambar!",
        ]);

        if($request->hasFile('gambar')){
          $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
        }

        $article = new Article;
        $article->author = $request->nama;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->gambar = $request->file('gambar')->getClientOriginalName();
        $article->save();

        return redirect('admin/Artikel')->with('success','Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {
        //
        return view('superadmin.detailArtikel',compact('Article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $Article)
    {
        //
        return view('superadmin.editArtikel',compact('Article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $Article)
    {
        //
        $request->validate([
          'nama' => 'required',
          'title' => 'required',
          'content' => 'required'
        ]);

        $article = $Article;
        $article->author = $request->nama;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->update();

        return redirect('admin/Artikel/'.$article->id.'/detail')->with('success','Artikel Berhasil Di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        //
        $Article->delete();
        return redirect('/admin/Artikel')->with('success','Data berhasil dihapus');

    }
}
