@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Kota
                <a href="{{route('kota.create')}}" class="btn btn-primary float-right">
                Tambah Data</a>
                </div>

                @if(Session::has('sukses'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                                    {{ Session::get('sukses') }}
                                </div>
                                @endif

                                @if(Session::has('gagal'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                    {{ Session::get('gagal') }}
                                </div>
                                @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode kota</th>
                                    <th>Nama kota</th>
                                    <th colspan="3"><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($kota as $data)
                                <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->kode_kota}}</td>
                                        <td>{{$data->nama_kota}}</td>
                                        <td>
                                            <a href="{{route('kota.show',$data->id)}}" class="btn btn-info">Show</a>
                                        </td>
                                        <td>
                                            <a href="{{route('kota.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 