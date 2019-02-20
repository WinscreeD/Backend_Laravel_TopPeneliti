<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneliti_semua extends Model
{
  protected $table = 'peneliti';

  public function peneliti_psb(){
    return $this->hasOne('App\Peneliti','id_peneliti');
  }

  public function peneliti_nonpsb(){
    return $this->hasOne('App\Peneliti_nonpsb','id_peneliti');
  }
  public function kegiatan(){
    return $this->belongsToMany('App\Kegiatan','peserta_kegiatan','id_peneliti','id_kegiatan');
  }

  public function publikasi_jurnal(){
    return $this->belongsToMany('App\Publikasi_Jurnal','peserta_publikasi_jurnal','id_peneliti','id_publikasi_jurnal');
  }
  // public function kegiatan2(){
  //   return $this->morphedByMany('App\Kegiatan','peserta_kegiatan','id_peneliti','id_kegiatan');
  // }

  // public function peran(){
  //   return $this->morphedByMany('App\Peran','peserta_kegiatan','id_peneliti','id_peran');
  // }
}
