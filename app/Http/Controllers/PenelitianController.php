<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Peneliti;
use App\Peneliti_nonpsb;
use App\Keterangan;

class PenelitianController extends Controller
{
    public function __construct()
      {
          $this->middleware('auth');
      }
    public function index()
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

      return view('penelitian', ['jmlPenelitianBerlangsung' => $jmlPenelitianBerlangsung, 'jmlPenelitianSelesai' => $jmlPenelitianSelesai, 'penelitianSelesais' => $penelitianSelesais, 'penelitianBerlangsungs' => $penelitianBerlangsungs,'jmlPD'=>$jmlPD,'jmlPT'=>$jmlPT,'jmlPP'=>$jmlPP,'jmlPDP'=>$jmlPDP,'jmlPKPT'=>$jmlPKPT,'jmlPPS'=>$jmlPPS,'jmlPDUPT'=>$jmlPDUPT,'jmlPTUPT'=>$jmlPTUPT,'jmlPPUPT'=>$jmlPPUPT,'jmlKRUPT'=>$jmlKRUPT,'jmlKKS'=>$jmlKKS]);
    }
}
