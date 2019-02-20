<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peneliti;
use App\Peneliti_semua;
use App\Peserta_Kegiatan;
use App\Kegiatan;
use App\Peran;

class Seminar_WorkshopController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
  public function index()
    {

      $nowdate = date('Y-m-d');
      $jmlInternasional = Kegiatan::where('id_kategori_tipe_kegiatan','23')->where('id_tipe_kegiatan',4)->count();
      $jmlNasional = Kegiatan::where('id_kategori_tipe_kegiatan','24')->where('id_tipe_kegiatan',4)->count();

      $seminars = Kegiatan::where('id_tipe_kegiatan','4')->orderBy('nama_kegiatan','asc')->get();
      
      
      foreach($seminars as $key1 => $sem){
        foreach ($sem->peneliti_semua as $key2 => $peneliti) {
          
          $asd=Peserta_Kegiatan::where('id_kegiatan',$sem->id)->where('id_peneliti', $peneliti->id)->first();
          $peran[$key1][$key2]=$asd->Peran->nama_peran;
          
        }
      }
      
  
      $sbgPeserta = Peserta_Kegiatan::where('id_peran',7)->count();
      $sbgKeynote = Peserta_Kegiatan::where('id_peran',4)->count();
      $sbgOral = Peserta_Kegiatan::where('id_peran',5)->count();
      $sbgPoster = Peserta_Kegiatan::where('id_peran',6)->count();

      return view('seminar_workshop',['seminars' => $seminars, 'jmlInternasional'=>$jmlInternasional,'jmlNasional'=>$jmlNasional,'sbgPeserta'=>$sbgPeserta,'sbgOral'=>$sbgOral,'sbgPoster'=>$sbgPoster,'sbgKeynote'=>$sbgKeynote,'peran'=>$peran]);
    }
}


      // //peran seminar nasional
      // $semNasional = Kegiatan::where('id_kategori_tipe_kegiatan','24')->get();
      // $semNasionalPeserta=[];
      // $semNasionalOral=[];
      // $semNasionalPoster=[];
      // $semNasionalKeynote=[];

      // foreach($semNasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',4)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semNasionalKeynote[] = $querySem;
      //   }  
      // }
      // foreach($semNasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',5)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semNasionalOral[] = $querySem;
      //   }  
      // }
      // foreach($semNasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',6)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semNasionalPoster[] = $querySem;
      //   }  
      // }
      // foreach($semNasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',7)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semNasionalPeserta[] = $querySem;
      //   }  
      // }

      // $sbgpesertaNasional = count($semNasionalPeserta);
      // $sbgoralNasional = count($semNasionalOral);
      // $sbgposterNasional = count($semNasionalPoster);
      // $sbgkeynoteNasional = count($semNasionalKeynote);

      // //peran seminar internasional
      // $semInternasional = Kegiatan::where('id_kategori_tipe_kegiatan','23')->get();
      // $semInternasionalPeserta=[];
      // $semInternasionalOral=[];
      // $semInternasionalPoster=[];
      // $semInternasionalKeynote=[];

      // foreach($semInternasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',4)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semInternasionalKeynote[] = $querySem;
      //   }  
      // }
      // foreach($semInternasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',5)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semInternasionalOral[] = $querySem;
      //   }  
      // }
      // foreach($semInternasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',6)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semInternasionalPoster[] = $querySem;
      //   }  
      // }
      // foreach($semInternasional as $sem){
      //   $querySem = Peserta_Kegiatan::where('id_peran',7)->where('id_kegiatan',$sem->id)->count();
      //   if($querySem != 0){
      //     $semInternasionalPeserta[] = $querySem;
      //   }  
      // }

      // $sbgpesertaInternasional = count($semInternasionalPeserta);
      // $sbgoralInternasional = count($semInternasionalOral);
      // $sbgposterInternasional = count($semInternasionalPoster);
      // $sbgkeynoteInternasional = count($semInternasionalKeynote);