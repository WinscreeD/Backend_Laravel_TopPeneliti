<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
  protected $table = 'fakultas';

  public function departemen(){
    return $this->hasMany('App\Departemen','id_fakultas');
  }
}
