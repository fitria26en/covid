@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Kecamatan</div>
                <div class="card-body">
                <form action="{{route('kecamatan.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <label>Kode kecamatan</label>
                        <input type="text" name="kode_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama kecamatan</label>
                        <input type="text" name="nama_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Kota</label>
                    <select name="kota_id" class="form-control">
                    @foreach ($kota as $data)
                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
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