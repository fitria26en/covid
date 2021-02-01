<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index',compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create', compact('provinsi'));
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
            $kota = new Kota();
            $kota->kode_kota = $request->kode_kota;
            $kota->nama_kota = $request->nama_kota;
            $kota->id_provinsi = $request->id_provinsi;
            $kota->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::All();
        return view('admin.kota.show',compact('kota','provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kota  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::All();
        $selected = $kota->provinsi->pluck('id')->toArray();
        return view('admin.kota.edit',compact('kota','provinsi','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kota $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $reques, $id)
    {
        try{
            $kota = Kota::findOrFail($id);
            $kota->kode_kota = $request->kode_kota;
            $kota->nama_kota = $request->nama_kota;
            $kota->id_provinsi = $request->id_provinsi;
            $kota->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kota.index');
    }
    
    /**
     *
     * Remove the specified resource from storage.
     * @param  \App\Models\kota  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index');
    }
}
