@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Rw</div>
                <div class="card-body">
                <form action="{{route('rw.store')}}" method="POST">
                   @csrf
                    <div class="form-group">
                        <label>Kode rw</label>
                        <input type="text" name="kode_rw" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama rw</label>
                        <input type="text" name="nama_rw" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>kelurahan</label>
                    <select name="id_kelurahan" class="form-control">
                    @foreach ($kelurahan as $data)
                    <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
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