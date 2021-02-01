<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jumlahkasus extends Model
{
    use HasFactory;

    protected $fillable = ['jumlah_reaktif','jumlah_positif','jumlah_negatif','jumlah_meninggal','tanggal','rw_id'];
    public $timestamps = true;

    public function rw()
    {
        return $this->belongsTo('App\Models\Rw','id_rw');
    }
}
