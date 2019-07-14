<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
  protected $table = 'kegiatan';

  public function peneliti_semua(){
    return $this->belongsToMany('App\Peneliti_semua','peserta_kegiatan','id_kegiatan','id_peneliti');
  }

  public function kategori_kegiatan(){
    return $this->belongsTo('App\Kategori_tipe_kegiatan','id_kategori_tipe_kegiatan');
  }

  public function peran(){
    return $this->belongsToMany('App\Peran','peserta_kegiatan','id_kegiatan','id_peran');
  }

  public function peserta_kegiatan(){
    return $this->belongsTo('App\Peserta_kegiatan','peserta_kegiatan','id_kegiatan','id_peserta_kegiatan');
  }

  public function tipe_kegiatan(){
    return $this-> belongsTo('App\Tipe_kegiatan', 'id_tipe_kegiatan');
  }

  public function berkas(){
    return $this-> hasMany('App\Berkas','id_kegiatan');
  }

  // public function peneliti_semua2(){
  //   return $this->morphToMany('App\Peneliti_Semua','peserta_kegiatan','id_kegiatan','id_peneliti');
  // }
}
