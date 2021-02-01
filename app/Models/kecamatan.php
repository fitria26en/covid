<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $fillable=['kode_kecamatan','nama_kecamatan','kota_id'];
    public $timestamps = true;

    public function kota(){
        return $this->belongsTo('App\Models\Kota', 'kota_id');
    }
    public function kelurahan(){
        return $this->hasMany('App\Models\kelurahan','id_kecamatan');
    }
}
