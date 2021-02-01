<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Rw;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='kasus';
        $kasus = Kasus::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.kasus.index',compact('kasus','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data';
        return view('admin.kasus.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $kasus = new Kasus;
        $kasus->jumlah_reaktif = $request->jumlah_reaktif;
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->id_rw = $request->id_rw;
        $kasus ->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route('kasus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail kasus';
        $kasus = Kasus::findOrFail($id);
        $rw = Rw::all();
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        return view('admin.kasus.show',compact('rw','title','rw','provinsi','kelurahan','kecamatan','kota','kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kasus = Kasus::findOrFail($id);
        $rw = Rw::all();
        return view('admin.kasus.edit',compact('rw','title','kasus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $kasus = Kasus::findOrFail($id);
            $kasus->jumlah_reaktif = $request->jumlah_reaktif;
            $kasus->jumlah_positif = $request->jumlah_positif;
            $kasus->jumlah_sembuh = $request->jumlah_sembuh;
            $kasus->jumlah_meninggal = $request->jumlah_meninggal;
            $kasus->tanggal = $request->tanggal;
            $kasus->id_rw = $request->id_rw;
            $kasus ->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kasus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kasus = Kasus::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kasus.index");
    }
}