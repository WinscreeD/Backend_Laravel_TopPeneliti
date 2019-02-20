<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penelitian;
use App\Kegiatan;

class PengmasController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
  public function index()
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
      return view('pengmas',['jmlPengmasBerlangsung' => $jmlPengmasBerlangsung, 'jmlPengmasSelesai' => $jmlPengmasSelesai, 'pengmasSelesais' => $pengmasSelesais, 'pengmasBerlangsungs' => $pengmasBerlangsungs,'jmlPKM'=>$jmlPKM,'jmlPKMS'=>$jmlPKMS,'jmlKKNPPM'=>$jmlKKNPPM,'jmlPPK'=>$jmlPPK,'jmlPPPUD'=>$jmlPPPUD,'jmlPPUPIK'=>$jmlPPUPIK,'jmlPPDM'=>$jmlPPDM,'jmlPKW'=>$jmlPKW,'jmlPPMUPT'=>$jmlPPMUPT,'jmlPPIM'=>$jmlPPIM]);
    }
}
  
