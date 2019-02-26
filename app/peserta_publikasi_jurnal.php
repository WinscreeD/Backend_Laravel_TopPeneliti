<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta_publikasi_jurnal extends Model
{
    protected $table = 'peserta_publikasi_jurnal';

    public function peneliti(){
    	return $this->belongsTo('App\Peneliti_semua','id_peneliti');
  	}
  	public function publikasi_jurnal(){
    	return $this->belongsTo('App\Publikasi_Jurnal','id_publikasi_jurnal');
  	}
}
