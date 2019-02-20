<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneliti_nonpsb extends Model
{
  protected $table = 'peneliti_nonpsb';

  public function peneliti_semua(){
    return $this->belongsTo('App\Peneliti_semua','id_peneliti');
  }

}
