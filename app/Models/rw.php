<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;
    protected $fillable=['kode_rw','nama_rw','id_kelurahan'];
    public $timestamps = true;


    public function kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan', 'id_kelurahan');
    }
    public function jumlahkasus(){
        return $this->hasMany('App\Models\Jumlahkaus','id_rw');
    }
}
