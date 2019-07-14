<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Tipe_kegiatan;
use App\Peneliti_semua;
use App\Peserta_Kegiatan;

class ApiKegiatanController extends Controller
{
    public function penelitian()
    {
      $nowdate = date('Y-m-d');
      
      $jmlPD = Kegiatan::where('id_kategori_tipe_kegiatan', '1')->count();
      $jmlPT = Kegiatan::where('id_kategori_tipe_kegiatan', '2')->count();
      $jmlPP = Kegiatan::where('id_kategori_tipe_kegiatan', '3')->count();
      $jmlPDP = Kegiatan::where('id_kategori_tipe_kegiatan', '4')->count();
      $jmlPKPT = Kegiatan::where('id_kategori_tipe_kegiatan', '5')->count();
      $jmlPPS = Kegiatan::where('id_kategori_tipe_kegiatan', '6')->count();
      $jmlPDUPT = Kegiatan::where('id_kategori_tipe_kegiatan', '7')->count();
      $jmlPTUPT = Kegiatan::where('id_kategori_tipe_kegiatan', '8')->count();
      $jmlPPUPT = Kegiatan::where('id_kategori_tipe_kegiatan', '9')->count();
      $jmlKRUPT = Kegiatan::where('id_kategori_tipe_kegiatan', '10')->count();
      $jmlKKS = Kegiatan::where('id_kategori_tipe_kegiatan', '11')->count();

      $penelitianSelesais = Kegiatan::where('tanggal_akhir','<', $nowdate)->where('id_tipe_kegiatan',1)->orderBy('nama_kegiatan','asc')->get();
      
      $penelitianBerlangsungs = Kegiatan::where('tanggal_akhir','>=', $nowdate)->where('id_tipe_kegiatan',1)->orderBy('nama_kegiatan','asc')->get();

      $jmlPenelitianSelesai = $penelitianSelesais->count();
      $jmlPenelitianBerlangsung = $penelitianBerlangsungs->count();

      return response()->json(['jmlPenelitianBerlangsung' => $jmlPenelitianBerlangsung, 'jmlPenelitianSelesai' => $jmlPenelitianSelesai, 'penelitianSelesais' => $penelitianSelesais, 'penelitianBerlangsungs' => $penelitianBerlangsungs,'jmlPD'=>$jmlPD,'jmlPT'=>$jmlPT,'jmlPP'=>$jmlPP,'jmlPDP'=>$jmlPDP,'jmlPKPT'=>$jmlPKPT,'jmlPPS'=>$jmlPPS,'jmlPDUPT'=>$jmlPDUPT,'jmlPTUPT'=>$jmlPTUPT,'jmlPPUPT'=>$jmlPPUPT,'jmlKRUPT'=>$jmlKRUPT,'jmlKKS'=>$jmlKKS]);
    }

    public function kerjasama()
    {
      $nowdate = date('Y-m-d');
      $kerjasamaSelesais = Kegiatan::where('tanggal_akhir','<', $nowdate)->where('id_tipe_kegiatan',2)->orderBy('nama_kegiatan','asc')->get();
        
      $kerjasamaBerlangsungs = Kegiatan::where('tanggal_akhir','>=', $nowdate)->where('id_tipe_kegiatan',2)->orderBy('nama_kegiatan','asc')->get();
  
      $jmlkerjasamaSelesai = $kerjasamaSelesais->count();
      $jmlkerjasamaBerlangsung = $kerjasamaBerlangsungs->count();
  
      return response()->json(['jmlkerjasamaBerlangsung' => $jmlkerjasamaBerlangsung, 'jmlkerjasamaSelesai' => $jmlkerjasamaSelesai, 'kerjasamaSelesais' => $kerjasamaSelesais, 'kerjasamaBerlangsungs' => $kerjasamaBerlangsungs]);
    }

    public function pengmas()
    {

      $nowdate = date('Y-m-d');
      
      $jmlPKM = Kegiatan::where('id_kategori_tipe_kegiatan', '13')->count();
      $jmlPKMS = Kegiatan::where('id_kategori_tipe_kegiatan', '14')->count();
      $jmlKKNPPM = Kegiatan::where('id_kategori_tipe_kegiatan', '15')->count();
      $jmlPPK = Kegiatan::where('id_kategori_tipe_kegiatan', '16')->count();
      $jmlPPPUD = Kegiatan::where('id_kategori_tipe_kegiatan', '17')->count();
      $jmlPPUPIK = Kegiatan::where('id_kategori_tipe_kegiatan', '18')->count();
      $jmlPPDM = Kegiatan::where('id_kategori_tipe_kegiatan', '19')->count();
      $jmlPKW = Kegiatan::where('id_kategori_tipe_kegiatan', '20')->count();
      $jmlPPMUPT = Kegiatan::where('id_kategori_tipe_kegiatan', '21')->count();
      $jmlPPIM = Kegiatan::where('id_kategori_tipe_kegiatan', '22')->count();

      $pengmasSelesais=Kegiatan::where('tanggal_akhir','<', $nowdate)->where('id_tipe_kegiatan','=','3')->orderBy('nama_kegiatan','asc')->get();
      $pengmasBerlangsungs=Kegiatan::where('tanggal_akhir','>=', $nowdate)->where('id_tipe_kegiatan','=','3')->orderBy('nama_kegiatan','asc')->get();

      $jmlPengmasSelesai = $pengmasSelesais->count();
      $jmlPengmasBerlangsung = $pengmasBerlangsungs->count();
      return response()->json(['jmlPengmasBerlangsung' => $jmlPengmasBerlangsung, 'jmlPengmasSelesai' => $jmlPengmasSelesai, 'pengmasSelesais' => $pengmasSelesais, 'pengmasBerlangsungs' => $pengmasBerlangsungs,'jmlPKM'=>$jmlPKM,'jmlPKMS'=>$jmlPKMS,'jmlKKNPPM'=>$jmlKKNPPM,'jmlPPK'=>$jmlPPK,'jmlPPPUD'=>$jmlPPPUD,'jmlPPUPIK'=>$jmlPPUPIK,'jmlPPDM'=>$jmlPPDM,'jmlPKW'=>$jmlPKW,'jmlPPMUPT'=>$jmlPPMUPT,'jmlPPIM'=>$jmlPPIM]);
    }

    public function seminar()
    {

      $nowdate = date('Y-m-d');
      $jmlInternasional = Kegiatan::where('id_kategori_tipe_kegiatan','23')->where('id_tipe_kegiatan',4)->count();
      $jmlNasional = Kegiatan::where('id_kategori_tipe_kegiatan','24')->where('id_tipe_kegiatan',4)->count();
      $seminars = Kegiatan::where('id_tipe_kegiatan','4')->orderBy('nama_kegiatan','asc')->get();    

    //   foreach($seminars as $key1 => $sem){
    //     foreach ($sem->peneliti_semua as $key2 => $peneliti) {
          
    //       $asd=Peserta_Kegiatan::where('id_kegiatan',$sem->id)->where('id_peneliti', $peneliti->id)->first();
    //       $peran[$key1][$key2]=$asd->Peran->nama_peran;
          
    //     }
    //   }   

      $sbgPeserta = Peserta_Kegiatan::where('id_peran',7)->count();
      $sbgKeynote = Peserta_Kegiatan::where('id_peran',4)->count();
      $sbgOral = Peserta_Kegiatan::where('id_peran',5)->count();
      $sbgPoster = Peserta_Kegiatan::where('id_peran',6)->count();

      return response()->json(['jmlInternasional'=>$jmlInternasional,'jmlNasional'=>$jmlNasional,'sbgPeserta'=>$sbgPeserta,'sbgOral'=>$sbgOral,'sbgPoster'=>$sbgPoster,'sbgKeynote'=>$sbgKeynote, 'seminars' => $seminars ]);
    }

    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::with('Tipe_kegiatan')->with('Berkas')
        ->where('kegiatan.id', $id)
        ->first();
          
        $penelitis = Peserta_kegiatan::with(['Peneliti_Semua'=>function($k){
            $k->with(['peneliti_psb'=>function($q){
              $q->with(['Pegawai']);
            }])->with(['Peneliti_nonpsb']);
          }])->where('id_kegiatan',$id)->get();

          return response()->json([
            'kegiatans'=>$kegiatan,
            'penelitis'=>$penelitis,
          ]);
    }
}
