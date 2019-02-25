<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Buku;
use App\Jurnal;
use App\Peneliti;
use App\Peserta_Kegiatan;
use App\Charts\HomeChart;
use App\Http\Controllers\Helper;
use App\Charts\HomeHighchart;
// use App\Publikasi_Jurnal;
use Excel;
use Auth;

class ApiHomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function user_check(){
    //     $users = Auth::user()->user_si;
    //     $true = 0;
    //     foreach ($users as $key ) {
    //         if($key->id_si == 5 && $key->id_role == 3){
    //             $true =1;
    //             break;
    //         }
    //     }

    //     if ($true != 1) {
    //         Auth::logout();
    //         return redirect('login')->with('error', 'Maaf anda tidak memiliki izin untuk mengakses halaman ini');
    //     } elseif ($true == 1) {
    //         return redirect('home');
    //     }
    // }

    public function index(){

        // Kebutuhan higchart
        $nowYear = date('Y');
        $nowdate = date('Y-m-d');


        //date
        $thnIni = $nowYear;
        $thnLalu = $nowYear-1;
        $duaThnLalu = $nowYear-2;
        $tigaThnLalu = $nowYear-3;

        //JumlahPenelitian
        $penelitianThnIni=Kegiatan::where('id_tipe_kegiatan',1)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear)->count();
        $penelitianThnLalu=Kegiatan::where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-1)->count();
        $penelitianDuaThnLalu=Kegiatan::where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-2)->count();
        $penelitianTigaThnLalu=Kegiatan::where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-3)->count();

        //Kerjasama
        $kerjasamaThnIni=Kegiatan::where('id_tipe_kegiatan',2)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear)->count();
        $kerjasamaThnLalu=Kegiatan::where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-1)->count();
        $kerjasamaDuaThnLalu=Kegiatan::where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-2)->count();
        $kerjasamaTigaThnLalu=Kegiatan::where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-3)->count();

        //JumlahSeminarWokshop
        $seminarWorkshopThnIni=Kegiatan::where('id_tipe_kegiatan','4')->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear)->count();
        $seminarWorkshopThnLalu=Kegiatan::where('id_tipe_kegiatan','4')->whereYear('tanggal_akhir',$nowYear-1)->count();
        $seminarWorkshopDuaThnLalu=Kegiatan::where('id_tipe_kegiatan','4')->whereYear('tanggal_akhir',$nowYear-2)->count();
        $seminarWorkshopTigaThnLalu=Kegiatan::where('id_tipe_kegiatan','4')->whereYear('tanggal_akhir',$nowYear-3)->count();

        //Pengmasy
        $pengmasThnIni=Kegiatan::where('id_tipe_kegiatan','3')->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear)->count();
        $pengmasThnLalu=Kegiatan::where('id_tipe_kegiatan','3')->whereYear('tanggal_akhir',$nowYear-1)->count();
        $pengmasDuaThnLalu=Kegiatan::where('id_tipe_kegiatan','3')->whereYear('tanggal_akhir',$nowYear-2)->count();
        $pengmasTigaThnLalu=Kegiatan::where('id_tipe_kegiatan','3')->whereYear('tanggal_akhir',$nowYear-3)->count();

        //Publikasi
        $jurnalThnIni = Jurnal::where('tahun_terbit', $nowYear)->count();
        $jurnalThnLalu = Jurnal::where('tahun_terbit', $nowYear-1)->count();
        $jurnalDuaThnLalu = Jurnal::where('tahun_terbit', $nowYear-2)->count();
        $jurnalTigaThnLalu = Jurnal::where('tahun_terbit', $nowYear-3)->count();

        $bukuThnIni = Buku::where('tahun_terbit', $nowYear)->count();
        $bukuThnLalu = Buku::where('tahun_terbit', $nowYear-1)->count();
        $bukuDuaThnLalu = Buku::where('tahun_terbit', $nowYear-2)->count();
        $bukuTigaThnLalu = Buku::where('tahun_terbit', $nowYear-3)->count();


        // Panell dashboar
        $peneliti = Peneliti::count();
        $penelitian = Kegiatan::where('id_tipe_kegiatan','1')->count();
        $kerjasama = Kegiatan::where('id_tipe_kegiatan','2')->count();
        $pengmas = Kegiatan::where('id_tipe_kegiatan','3')->count();
        $seminarWorkshop = Kegiatan::where('id_tipe_kegiatan','4')->count();
        $buku = Buku::count();
        $jurnal = Jurnal::count();

        $penelitiaktif = Peneliti::join('Peserta_Kegiatan', 'peserta_kegiatan.id_peneliti', '=', 'peneliti_psb.id_peneliti')
        ->join('Kegiatan', 'kegiatan.id', '=', 'peserta_kegiatan.id_kegiatan')
        ->where(function($k){
            $k->where('id_tipe_kegiatan',1)
            ->orWhere('id_tipe_kegiatan',2)
            ->orWhere('id_tipe_kegiatan',3);
            })
        ->where('tanggal_akhir','>=', $nowdate)
        ->count();

        $penelitinonaktif = $peneliti - $penelitiaktif;


        return response()->
        json(['succes'=>true,'message'=>"berhasil",
        'penelitinonaktif' => $penelitinonaktif,
        'penelitiaktif' => $penelitiaktif, 
        'peneliti' => $peneliti,
        'penelitian'=>$penelitian,
        'kerjasama'=>$kerjasama,
        'pengmas'=>$pengmas,
        'seminarWorkshop'=>$seminarWorkshop,
        'penelitianThnLalu' => $penelitianThnLalu,
        'penelitianDuaThnLalu'=>$penelitianDuaThnLalu,
        'penelitianTigaThnLalu'=>$penelitianTigaThnLalu, 'seminarWorkshopThnLalu' => $seminarWorkshopThnLalu, 'seminarWorkshopDuaThnLalu'=>$seminarWorkshopDuaThnLalu, 'seminarWorkshopTigaThnLalu'=>$seminarWorkshopTigaThnLalu, 'pengmasThnLalu'=>$pengmasThnLalu,'pengmasDuaThnLalu'=>$pengmasDuaThnLalu,'pengmasTigaThnLalu'=>$pengmasTigaThnLalu,'kerjasamaThnLalu'=>$kerjasamaThnLalu,'kerjasamaDuaThnLalu'=>$kerjasamaDuaThnLalu,'kerjasamaTigaThnLalu'=>$kerjasamaTigaThnLalu,'penelitianThnIni'=>$penelitianThnIni,'kerjasamaThnIni'=>$kerjasamaThnIni,'seminarWorkshopThnIni'=>$seminarWorkshopThnIni,'pengmasThnIni'=>$pengmasThnIni,'thnIni'=>$thnIni,'thnLalu'=>$thnLalu,'duaThnLalu'=>$duaThnLalu,'tigaThnLalu'=>$tigaThnLalu,
        'jurnalThnIni'=>$jurnalThnIni,'jurnalThnLalu'=>$jurnalThnLalu,'jurnalDuaThnLalu'=>$jurnalDuaThnLalu,
        'jurnalTigaThnLalu'=>$jurnalTigaThnLalu,
        'bukuThnIni'=>$bukuThnIni,'bukuThnLalu'=>$bukuThnLalu,'bukuDuaThnLalu'=>$bukuDuaThnLalu,
        'bukuTigaThnLalu'=>$bukuTigaThnLalu,
        'buku'=>$buku,'jurnal'=>$jurnal]);
    }


}


