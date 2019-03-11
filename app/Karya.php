<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karya_ilmiah';
    protected $fillable = [
        'id', 'judul', 'jenis', 'tahun_terbit','status_usulan','angka_kredit'
    ];
    public $timestamps = false;
}
