<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi_Jurnal extends Model
{
  protected $table = 'publikasi_jurnal';

  public function peneliti_semua(){
    return $this->belongsToMany('App\Peneliti_semua','peserta_publikasi_jurnal','id_publikasi_jurnal','id_peneliti');
  }
}
