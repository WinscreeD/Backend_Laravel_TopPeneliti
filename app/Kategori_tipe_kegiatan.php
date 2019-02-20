<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_tipe_kegiatan extends Model
{
  protected $table = 'kategori_tipe_kegiatan';

  public function kegiatan(){
    return $this->hasMany('App\Kegiatan','id_kategori_tipe_kegiatan');
  }
}
