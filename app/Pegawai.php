<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
  protected $table = 'pegawai';
  
  public function peneliti_semua(){
    return $this->hasOne('App\Pegawai','id_pegawai');
  }
}
