<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Peneliti;
use App\Peneliti_nonpsb;
use App\Publikasi_Jurnal;
class PublikasiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){

    $jurnals = Publikasi_Jurnal::get();
    return view('publikasi',['jurnals'=>$jurnals]);
  }
}
