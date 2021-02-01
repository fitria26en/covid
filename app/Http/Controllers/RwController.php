<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create', compact('kelurahan'));
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
            $rw = new Rw();
            $rw->kode_rw = $request->kode_rw;
            $rw->nama_rw = $request->nama_rw;
            $rw->id_kelurahan = $request->id_kelurahan;
            $rw->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('rw.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::All();
        return view('admin.rw.show',compact('rw','kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::All();
        $selected = $rw->kelurahan->pluck('id')->toArray();
        return view('admin.rw.edit',compact('rw','kelurahan','selected'));
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
            $rw = Rw::findOrFail($id);
            $rw->kode_rw = $request->kode_rw;
            $rw->nama_rw = $request->nama_rw;
            $rw->id_kelurahan = $request->id_kelurahan;
            $rw->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('rw.index');
    }
    
    /**
     *
     * Remove the specified resource from storage.
     * @param  \App\Models\rw  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id);
        $rw->delete();
        return redirect()->route('rw.index');
    }
}
