<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta_Kegiatan extends Model
{
  protected $table = 'peserta_kegiatan';

  public function peneliti_semua(){
    return $this->belongsTo('App\Peneliti_Semua','id_peneliti');
  }

  public function peran(){
    return $this->belongsTo('App\Peran', 'id_peran');
  }
}
