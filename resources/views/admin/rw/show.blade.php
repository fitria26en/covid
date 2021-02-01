@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Rw</div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Kode rw</label>
                    <input type="text" name="kode_rw" value="{{$rw->kode_rw}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label>Nama rw</label>
                    <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection