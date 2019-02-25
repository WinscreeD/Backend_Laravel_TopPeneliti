<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'publikasi_buku';

    public function peneliti_semua(){
        return $this->belongsToMany('App\Peneliti_semua','peserta_publikasi_buku','id_publikasi_buku','id_peneliti');
      }
}
