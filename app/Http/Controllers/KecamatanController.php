<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\Kota;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view('admin.kecamatan.create', compact('kota'));
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
            $kecamatan = new Kecamatan();
            $kecamatan->kode_kecamatan = $request->kode_kecamatan;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;            
            $kecamatan->kota_id = $request->kota_id;
            $kecamatan->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kecamatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::All();
        return view('admin.kecamatan.show',compact('kecamatan','kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::All();
        $selected = $kecamatan->kota->pluck('id')->toArray();
        return view('admin.kecamatan.edit',compact('kecamatan','kota','selected'));
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
            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->kode_kecamatan = $request->kode_kecamatan;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;           
            $kecamatan->kota_id = $request->kota_id;
            $kecamatan->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kecamatan.index');
    }
    
    /**
     *
     * Remove the specified resource from storage.
     * @param  \App\Models\kecamatan $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index');
    }
}
