@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Kota</div>
                <div class="card-body">
                <form action="{{route('kota.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <label>Kode kota</label>
                        <input type="text" name="kode_kota" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama kota</label>
                        <input type="text" name="nama_kota" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>provinsi</label>
                    <select name="id_provinsi" class="form-control">
                    @foreach ($provinsi as $data)
                    <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection