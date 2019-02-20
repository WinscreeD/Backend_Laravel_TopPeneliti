<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
  protected $table = 'peran';

  public function Kegiatan(){
    return $this->belongsToMany('App\Kegiatan','peserta_kegiatan','id_peran','id_kegiatan');
  }

  public function peneliti_semua(){
    return $this->morphToMany('App\Peneliti_Semua','peserta_kegiatan','id_peran','id_peneliti');
  }
}
