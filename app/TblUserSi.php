<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblUserSi extends Model
{
  protected $table = 'tbl_user_si';

  public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
