<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create', compact('kecamatan'));
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
            $kelurahan = new Kelurahan();
            $kelurahan->kode_kelurahan = $request->kode_kelurahan;
            $kelurahan->nama_kelurahan = $request->nama_kelurahan;
            $kelurahan->id_kecamatan = $request->id_kecamatan;
            $kelurahan->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::All();
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::All();
        $selected = $kelurahan->kecamatan->pluck('id')->toArray();
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $reques, $id)
    {
        try{
            $kelurahan = Kelurahan::findOrFail($id);
            $kelurahan->kode_kelurahan = $request->kode_kelurahan;
            $kelurahan->nama_kelurahan = $request->nama_kelurahan;
            $kelurahan->id_kecamatan = $request->id_kecamatan;
            $kelurahan->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kelurahan.index');
    }
    
    /**
     *
     * Remove the specified resource from storage.
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index');
    }
}
