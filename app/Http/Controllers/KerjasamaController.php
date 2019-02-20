<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Peneliti;
use App\Peneliti_nonpsb;
use App\Keterangan;

class KerjasamaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $nowdate = date('Y-m-d');
    $kerjasamaSelesais = Kegiatan::where('tanggal_akhir','<', $nowdate)->where('id_tipe_kegiatan',2)->orderBy('nama_kegiatan','asc')->get();
      
    $kerjasamaBerlangsungs = Kegiatan::where('tanggal_akhir','>=', $nowdate)->where('id_tipe_kegiatan',2)->orderBy('nama_kegiatan','asc')->get();

    $jmlkerjasamaSelesai = $kerjasamaSelesais->count();
    $jmlkerjasamaBerlangsung = $kerjasamaBerlangsungs->count();

    return view('kerjasama', ['jmlkerjasamaBerlangsung' => $jmlkerjasamaBerlangsung, 'jmlkerjasamaSelesai' => $jmlkerjasamaSelesai, 'kerjasamaSelesais' => $kerjasamaSelesais, 'kerjasamaBerlangsungs' => $kerjasamaBerlangsungs]);
  }
}
