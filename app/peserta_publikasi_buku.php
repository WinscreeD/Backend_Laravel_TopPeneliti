<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta_publikasi_buku extends Model
{
    protected $table = 'peserta_publikasi_buku';

    public function peneliti(){
    	return $this->belongsTo('App\Peneliti_semua','id_peneliti');
  	}
  	public function publikasi_buku(){
    	return $this->belongsTo('App\Buku','id_publikasi_buku');
  	}
}
