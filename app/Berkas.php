<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';

    public function kegiatan(){
    	return $this->belongsTo('App\Kegiatan','id_kegiatan');
  	}
}
