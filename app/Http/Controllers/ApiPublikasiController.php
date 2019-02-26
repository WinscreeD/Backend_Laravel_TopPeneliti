<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi_Jurnal;
use App\Buku;
use App\peserta_publikasi_buku;
use App\peserta_publikasi_jurnal;

class ApiPublikasiController extends Controller
{
    public function publikasi()
    {
      $buku = Buku::get(); 
      $jurnal = Publikasi_Jurnal::get();    
      return response()->json(['buku' => $buku, 'jurnal' => $jurnal ]);
    }

    public function detailbuku($id)
    {
        $buku = Buku::where('publikasi_buku.id', $id)->first();
          
        $penelitis = peserta_publikasi_buku::with(['peneliti'=>function($k){
            $k->with(['peneliti_psb'=>function($q){
              $q->with(['Pegawai']);
            }])->with(['Peneliti_nonpsb']);
          }])->where('id_publikasi_buku',$id)->get();

          return response()->json([
            'buku'=>$buku,
            'penelitis'=>$penelitis,
          ]);
    }

    public function detailjurnal($id)
    {
        $jurnal = Publikasi_Jurnal::where('publikasi_jurnal.id', $id)->first();
          
        $penelitis = peserta_publikasi_jurnal::with(['peneliti'=>function($k){
            $k->with(['peneliti_psb'=>function($q){
              $q->with(['Pegawai']);
            }])->with(['Peneliti_nonpsb']);
          }])->where('id_publikasi_jurnal',$id)->get();

          return response()->json([
            'jurnal'=>$jurnal,
            'penelitis'=>$penelitis,
          ]);
    }
}
