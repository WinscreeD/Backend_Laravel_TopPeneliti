<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe_kegiatan extends Model
{
    protected $table = 'tipe_kegiatan';

    public function kegiatan(){
    	return $this->hasMany('App\Kegiatan', 'id_tipe_kegiatan');
 	}
}
