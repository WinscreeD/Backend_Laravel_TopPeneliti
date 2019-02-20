<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneliti extends Model
{
  protected $table = 'peneliti_psb';
  public function pegawai(){
    return $this->belongsTo('App\Pegawai','id_pegawai');
  }

  public function departemen(){
    return $this->belongsTo('App\Departemen','id_departemen');
  }

  public function peneliti_semua(){
    return $this->belongsTo('App\Peneliti_semua','id_peneliti');
  }
  
}
