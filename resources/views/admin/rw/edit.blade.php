@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Daftar rw</div>
                <div class="card-body">
                    <form action="{{route('rw.update',$rw->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode rw</label>
                            <input type="number" name="kode_rw" class="form-control" value="{{ $rw->kode_rw }}" placeholder="Kode rw" required >
                            <label>Nama rw</label>
                            <input type="text" name="nama_rw" class="form-control" value="{{ $rw->nama_rw }}" placeholder="Nama rw" required autofocus>
                            <label>Nama kelurahan</label>
                            <select name="id_kelurahan" class="form-control" required>
                                @foreach ($kelurahan as $data)
                                <option value="{{$data->id}}" {{$data->id == $rw->id_kelurahan ? 'selected' : ''}} >{{$data->nama_kelurahan}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection