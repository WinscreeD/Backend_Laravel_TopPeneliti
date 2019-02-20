<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
  protected $table = 'departemen';

  public function peneliti_psb(){
    return $this->hasMany('App\Peneliti','id_departemen');
  }

  public function fakultas(){
    return $this->belongsTo('App\Fakultas','id_fakultas');
  }
}
