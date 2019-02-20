<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peneliti;
use App\Peneliti_semua;
use App\Peserta_Kegiatan;
use App\Kegiatan;
use App\Departemen;
use App\Fakultas;
use App\Publikasi_Jurnal;


class PenelitiController extends Controller
{

    public function __construct()
      {
          $this->middleware('auth');
      }
  
    public function index()
    {
      $penelitis = Peneliti::with('Pegawai')->get()->sortBy('Pegawai.nama');

      //Jumlah peneliti tingkat Fakultas
      $jmlFaperta = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','1');})->count();
      $jmlFkh= Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','2');})->count();
      $jmlFpik = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','3');})->count();
      $jmlFapet = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','4');})->count();
      $jmlFahutan = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','5');})->count();
      $jmlFateta = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','6');})->count();
      $jmlFmipa = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','7');})->count();
      $jmlFem = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','8');})->count();
      $jmlFema = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','9');})->count();
      $jmlDip = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','10');})->count();
      $jmlSb = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','11');})->count();
      $jmlSps = Peneliti::with('Departemen')->whereHas('Departemen', function($tipe){ $tipe->where('id_fakultas','12');})->count();

      //Jumlah peneliti tingkat departemen
      //Faperta
      $jmlAGH = Peneliti::where('id_departemen','1')->count();
      $jmlIlmuTanah = Peneliti::where('id_departemen','2')->count();
      $jmlProteksiTanaman = Peneliti::where('id_departemen','3')->count();
      $jmlARL = Peneliti::where('id_departemen','4')->count();
      //Fkh
      $jmlAnatomiFisiologi = Peneliti::where('id_departemen','5')->count();
      $jmlIlmuPenyakitHewan = Peneliti::where('id_departemen','6')->count();
      $jmlKlinikReproduksi = Peneliti::where('id_departemen','7')->count();
      //Fpik
      $jmlBDP = Peneliti::where('id_departemen','8')->count();
      $jmlMSP = Peneliti::where('id_departemen','9')->count();
      $jmlTHP = Peneliti::where('id_departemen','10')->count();
      $jmlPSP = Peneliti::where('id_departemen','11')->count();
      $jmlITK = Peneliti::where('id_departemen','12')->count();
      //Fapet
      $jmlIPTP = Peneliti::where('id_departemen','13')->count();
      $jmlINTP = Peneliti::where('id_departemen','14')->count();
      //Fahutan
      $jmlMNH = Peneliti::where('id_departemen','15')->count();
      $jmlHH = Peneliti::where('id_departemen','16')->count();
      $jmlKSHE = Peneliti::where('id_departemen','17')->count();
      $jmlSilvikultur = Peneliti::where('id_departemen','18')->count();            
      //Fateta
      $jmlTMB = Peneliti::where('id_departemen','19')->count();
      $jmlTIP = Peneliti::where('id_departemen','20')->count();
      $jmlSIL = Peneliti::where('id_departemen','21')->count(); 
      $jmlITP = Peneliti::where('id_departemen','22')->count();  
      //Fmipa
      $jmlSTK = Peneliti::where('id_departemen','23')->count();
      $jmlGFM = Peneliti::where('id_departemen','24')->count();
      $jmlBIO= Peneliti::where('id_departemen','25')->count(); 
      $jmlKIM = Peneliti::where('id_departemen','26')->count();  
      $jmlMAT = Peneliti::where('id_departemen','27')->count();
      $jmlKOM = Peneliti::where('id_departemen','28')->count();
      $jmlFIS = Peneliti::where('id_departemen','29')->count(); 
      $jmlBiokim = Peneliti::where('id_departemen','30')->count(); 
      //Fem
      $jmlIE = Peneliti::where('id_departemen','31')->count();
      $jmlMAN = Peneliti::where('id_departemen','32')->count();
      $jmlAGB = Peneliti::where('id_departemen','33')->count();
      $jmlESL = Peneliti::where('id_departemen','34')->count(); 
      //Fema
      $jmlGM = Peneliti::where('id_departemen','35')->count();
      $jmlIKK = Peneliti::where('id_departemen','36')->count();
      $jmlSKPM = Peneliti::where('id_departemen','37')->count(); 
      //Dip
      $jmlKomunikasi = Peneliti::where('id_departemen','38')->count();
      $jmlEkow = Peneliti::where('id_departemen','39')->count();
      $jmlManIn = Peneliti::where('id_departemen','40')->count();
      $jmlTekKom = Peneliti::where('id_departemen','41')->count();
      $jmlSJMP = Peneliti::where('id_departemen','42')->count();
      $jmlMIJMG = Peneliti::where('id_departemen','43')->count(); 
      $jmlTIB = Peneliti::where('id_departemen','44')->count();
      $jmlManPerBud = Peneliti::where('id_departemen','45')->count();
      $jmlManTekTer = Peneliti::where('id_departemen','46')->count(); 
      $jmlManAGB = Peneliti::where('id_departemen','47')->count();
      $jmlPPPM = Peneliti::where('id_departemen','48')->count();
      $jmlTKJ = Peneliti::where('id_departemen','49')->count(); 
      $jmlAnKim = Peneliti::where('id_departemen','50')->count();
      $jmlTekManLing = Peneliti::where('id_departemen','51')->count();
      $jmlAkuntansi = Peneliti::where('id_departemen','52')->count(); 
      $jmlPerkebunanKlpSwt = Peneliti::where('id_departemen','53')->count();
      $jmlProdPengPertanian = Peneliti::where('id_departemen','54')->count();
      $jmlParVet = Peneliti::where('id_departemen','55')->count(); 

      return view('peneliti',['penelitis' => $penelitis, 'jmlFaperta'=>$jmlFaperta,'jmlFkh'=>$jmlFkh,'jmlFpik'=>$jmlFpik,'jmlFapet'=>$jmlFapet,'jmlFahutan'=>$jmlFahutan,'jmlFateta'=>$jmlFateta,'jmlFmipa'=>$jmlFmipa,'jmlFem'=>$jmlFem,'jmlFema'=>$jmlFema,'jmlDip'=>$jmlDip,'jmlSb'=>$jmlSb,'jmlSps'=>$jmlSps,'jmlAGH'=>$jmlAGH,'jmlIlmuTanah'=>$jmlIlmuTanah,'jmlProteksiTanaman'=>$jmlProteksiTanaman,'jmlARL'=>$jmlARL,'jmlAnatomiFisiologi'=>$jmlAnatomiFisiologi,'jmlIlmuPenyakitHewan'=>$jmlIlmuPenyakitHewan,'jmlKlinikReproduksi'=>$jmlKlinikReproduksi,'jmlBDP'=>$jmlBDP,'jmlMSP'=>$jmlMSP,'jmlTHP'=>$jmlTHP,'jmlPSP'=>$jmlPSP,'jmlITK'=>$jmlITK,'jmlIPTP'=>$jmlIPTP,'jmlINTP'=>$jmlINTP,'jmlMNH'=>$jmlMNH,'jmlHH'=>$jmlHH,'jmlKSHE'=>$jmlKSHE,'jmlSilvikultur'=>$jmlSilvikultur,'jmlTMB'=>$jmlTMB,'jmlTIP'=>$jmlTIP,'jmlSIL'=>$jmlSIL,'jmlITP'=>$jmlITP,'jmlSTK'=>$jmlSTK,'jmlGFM'=>$jmlGFM,'jmlBIO'=>$jmlBIO,'jmlKIM'=>$jmlKIM,'jmlMAT'=>$jmlMAT,'jmlKOM'=>$jmlKOM,'jmlFIS'=>$jmlFIS,'jmlBiokim'=>$jmlBiokim,'jmlIE'=>$jmlIE,'jmlMAN'=>$jmlMAN,'jmlAGB'=>$jmlAGB,'jmlESL'=>$jmlESL,'jmlGM'=>$jmlGM,'jmlIKK'=>$jmlIKK,'jmlSKPM'=>$jmlSKPM,'jmlKomunikasi'=>$jmlKomunikasi,'jmlEkow'=>$jmlEkow,'jmlManIn'=>$jmlManIn,'jmlTekKom'=>$jmlTekKom,'jmlSJMP'=>$jmlSJMP,'jmlMIJMG'=>$jmlMIJMG,'jmlTIB'=>$jmlTIB,'jmlManPerBud'=>$jmlManPerBud,'jmlManTekTer'=>$jmlManTekTer,'jmlManAGB'=>$jmlManAGB,'jmlPPPM'=>$jmlPPPM,'jmlTKJ'=>$jmlTKJ,'jmlAnKim'=>$jmlAnKim,'jmlTekManLing'=>$jmlTekManLing,'jmlAkuntansi'=>$jmlAkuntansi,'jmlPerkebunanKlpSwt'=>$jmlPerkebunanKlpSwt,'jmlProdPengPertanian'=>$jmlProdPengPertanian,'jmlParVet'=>$jmlParVet]);
    }

    public function detail_peneliti($id)
    {

      $peneliti = Peneliti::where('id_peneliti',$id)->first();
      if($peneliti == NULL ){
        return abort(404);
      }
      else {
      $nowYear = date('Y');
      $nowdate = date('Y-m-d');

      //date
      $thnIni = $nowYear;
      $thnLalu = $nowYear-1;
      $duaThnLalu = $nowYear-2;
      $tigaThnLalu = $nowYear-3;
      
      //Jumlah Kegiatan
      $queryDikti = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_tipe_kegiatan',1);}])->where('id',$id)->first();
      $penelitianDikti=$queryDikti->Kegiatan->count();

      $queryKerjasama = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_tipe_kegiatan',2);}])->where('id',$id)->first();
      $kerjasama = $queryKerjasama->Kegiatan->count();

      $queryPengmas = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_tipe_kegiatan',3);}])->where('id',$id)->first();
      $pengmas = $queryPengmas->Kegiatan->count();

      $querySeminar = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_tipe_kegiatan',4);}])->where('id',$id)->first();
      $seminarWorkshop = $querySeminar->Kegiatan->count();

      $queryJurnal = Peneliti_semua::with(['Publikasi_Jurnal'=>function($var){}])->where('id',$id)->first();
      $jurnals=$queryJurnal->Publikasi_Jurnal->count();
    
      //thn ini
      $querydiktiThnIni = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear, $nowdate){ $var->where('id_tipe_kegiatan',1)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear);}])->where('id',$id)->first();
      $diktiThnIni=$querydiktiThnIni->Kegiatan->count();

      $querykerjasamaThnIni = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear, $nowdate){ $var->where('id_tipe_kegiatan',2)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear);}])->where('id',$id)->first();
      $kerjasamaThnIni=$querykerjasamaThnIni->Kegiatan->count();

      $querypengmasThnIni = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear, $nowdate){ $var->where('id_tipe_kegiatan',3)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear);}])->where('id',$id)->first();
      $pengmasThnIni=$querypengmasThnIni->Kegiatan->count();

      $querysemwoThnIni = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear, $nowdate){ $var->where('id_tipe_kegiatan',4)->where('tanggal_akhir','<', $nowdate)->whereYear('tanggal_akhir',$nowYear);}])->where('id',$id)->first();
      $semwoThnIni=$querysemwoThnIni->Kegiatan->count();

      //Kegiatan thn lalu
      $querydiktiThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear, $nowdate){ $var->where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-1);}])->where('id',$id)->first();
      $diktiThnLalu=$querydiktiThnLalu->Kegiatan->count();

      $querykerjasamaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-1);}])->where('id',$id)->first();
      $kerjasamaThnLalu=$querykerjasamaThnLalu->Kegiatan->count();

      $querypengmasThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',3)->whereYear('tanggal_akhir',$nowYear-1);}])->where('id',$id)->first();
      $pengmasThnLalu=$querypengmasThnLalu->Kegiatan->count();

      $querysemwoThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',4)->whereYear('tanggal_akhir',$nowYear-1);}])->where('id',$id)->first();
      $semwoThnLalu=$querysemwoThnLalu->Kegiatan->count();

      //duaThnlalu
      $querydiktiDuaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-2);}])->where('id',$id)->first();
      $diktiDuaThnLalu=$querydiktiDuaThnLalu->Kegiatan->count();

      $querykerjasamaDuaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-2);}])->where('id',$id)->first();
      $kerjasamaDuaThnLalu=$querykerjasamaDuaThnLalu->Kegiatan->count();

      $querypengmasDuaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',3)->whereYear('tanggal_akhir',$nowYear-2);}])->where('id',$id)->first();
      $pengmasDuaThnLalu=$querypengmasDuaThnLalu->Kegiatan->count();

      $querysemwoDuaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',4)->whereYear('tanggal_akhir',$nowYear-2);}])->where('id',$id)->first();
      $semwoDuaThnLalu=$querysemwoDuaThnLalu->Kegiatan->count();

      //TigaThn
      $querydiktiTigaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',1)->whereYear('tanggal_akhir',$nowYear-3);}])->where('id',$id)->first();
      $diktiTigaThnLalu=$querydiktiTigaThnLalu->Kegiatan->count();

      $querykerjasamaTigaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',2)->whereYear('tanggal_akhir',$nowYear-3);}])->where('id',$id)->first();
      $kerjasamaTigaThnLalu=$querykerjasamaTigaThnLalu->Kegiatan->count();

      $querypengmasTigaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',3)->whereYear('tanggal_akhir',$nowYear-3);}])->where('id',$id)->first();
      $pengmasTigaThnLalu=$querypengmasTigaThnLalu->Kegiatan->count();

      $querysemwoTigaThnLalu = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowYear){ $var->where('id_tipe_kegiatan',4)->whereYear('tanggal_akhir',$nowYear-3);}])->where('id',$id)->first();
      $semwoTigaThnLalu=$querysemwoTigaThnLalu->Kegiatan->count();
  
      //Kegiatan yang sedang dilakukan
      $penelitianOngoing = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',1)->where('tanggal_akhir','>=', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumpenelitianOngoing = $penelitianOngoing->Kegiatan->count();

      $kerjasamaOngoing = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',2)->where('tanggal_akhir','>=', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumkerjasamaOngoing = $kerjasamaOngoing->Kegiatan->count();

      $pengmasOngoing = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',3)->where('tanggal_akhir','>=', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumpengmasOngoing = $pengmasOngoing->Kegiatan->count();

      //Kegiatan yang telah selesai
      $penelitianPast = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',1)->where('tanggal_akhir','<', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumpenelitianPast = $penelitianPast->Kegiatan->count();

      $kerjasamaPast = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',2)->where('tanggal_akhir','<', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumkerjasamaPast = $kerjasamaPast->Kegiatan->count();

      $pengmasPast = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',3)->where('tanggal_akhir','<', $nowdate)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();
      $sumpengmasPast = $pengmasPast->Kegiatan->count();

      $seminarPast = Peneliti_semua::with(['Kegiatan'=>function($var) use($nowdate){ $var->where('id_tipe_kegiatan',4)->orderBy('nama_kegiatan','asc');}])->where('id',$id)->first();

      $jurnalPast = Peneliti_semua::with(['Publikasi_Jurnal'=>function($var) use($nowdate){ $var->orderBy('judul_artikel','asc');}])->where('id',$id)->first();
     
      $peran[][]=NULL;
        foreach($seminarPast->Kegiatan as $key1 => $sem){
          foreach ($sem->peneliti_semua as $key2 => $var) {
            $asd=Peserta_Kegiatan::where('id_kegiatan',$sem->id)->where('id_peneliti', $id)->first();
            $peran[$key1][$key2]=$asd->Peran->nama_peran;
          }
        }
  
      //Seminar per Regional
      $semInternasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',23);}])->where('id',$id)->first();
      $jmlInternasional = $semInternasional->Kegiatan->count();

      $semNasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',24);}])->where('id',$id)->first();
      $jmlNasional = $semNasional->Kegiatan->count();

      //Peran
      //nasional
      $pesertaNasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',24)->where('id_peran',7);}])->where('id',$id)->first();
      $sbgpesertaNasional = $pesertaNasional->Kegiatan->count();

      $oralNasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',24)->where('id_peran',5);}])->where('id',$id)->first();
      $sbgoralNasional = $oralNasional->Kegiatan->count();

      $posterNasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',24)->where('id_peran',6);}])->where('id',$id)->first();
      $sbgposterNasional = $posterNasional->Kegiatan->count();

      $keynoteNasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',24)->where('id_peran',4);}])->where('id',$id)->first();
      $sbgkeynoteNasional = $keynoteNasional->Kegiatan->count();

      //internasinal
      $pesertaInternasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',23)->where('id_peran',7);}])->where('id',$id)->first();
      $sbgpesertaInternasional = $pesertaInternasional->Kegiatan->count();

      $oralInternasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',23)->where('id_peran',5);}])->where('id',$id)->first();
      $sbgoralInternasional = $oralInternasional->Kegiatan->count();

      $posterInternasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',23)->where('id_peran',6);}])->where('id',$id)->first();
      $sbgposterInternasional = $posterInternasional->Kegiatan->count();

      $keynoteInternasional = Peneliti_semua::with(['Kegiatan'=>function($var){ $var->where('id_kategori_tipe_kegiatan',23)->where('id_peran',4);}])->where('id',$id)->first();
      $sbgkeynoteInternasional = $keynoteInternasional->Kegiatan->count();

      return view('detail_peneliti',['peneliti' => $peneliti,'penelitianDikti'=>$penelitianDikti,'kerjasama'=>$kerjasama,'seminarWorkshop'=>$seminarWorkshop,'pengmas'=>$pengmas,'diktiThnLalu'=>$diktiThnLalu,'kerjasamaThnLalu'=>$kerjasamaThnLalu,'semwoThnLalu'=>$semwoThnLalu,'pengmasThnLalu'=>$pengmasThnLalu,'diktiDuaThnLalu'=>$diktiDuaThnLalu,'kerjasamaDuaThnLalu'=>$kerjasamaDuaThnLalu,'semwoDuaThnLalu'=>$semwoDuaThnLalu,'pengmasDuaThnLalu'=>$pengmasDuaThnLalu,'diktiTigaThnLalu'=>$diktiTigaThnLalu,'kerjasamaTigaThnLalu'=>$kerjasamaTigaThnLalu,'semwoTigaThnLalu'=>$semwoTigaThnLalu,'pengmasTigaThnLalu'=>$pengmasTigaThnLalu,'penelitianOngoing'=>$penelitianOngoing,'sumpenelitianOngoing'=>$sumpenelitianOngoing,'kerjasamaOngoing'=>$kerjasamaOngoing,'sumkerjasamaOngoing'=>$sumkerjasamaOngoing,'pengmasOngoing'=>$pengmasOngoing,'sumpengmasOngoing'=>$sumpengmasOngoing,'jmlInternasional'=>$jmlInternasional,'jmlNasional'=>$jmlNasional,'sbgpesertaNasional'=>$sbgpesertaNasional,'sbgoralNasional'=>$sbgoralNasional,'sbgposterNasional'=>$sbgposterNasional,'sbgkeynoteNasional'=>$sbgkeynoteNasional,'sbgpesertaInternasional'=>$sbgpesertaInternasional,'sbgoralInternasional'=>$sbgoralInternasional,'sbgposterInternasional'=>$sbgposterInternasional,'sbgkeynoteInternasional'=>$sbgkeynoteInternasional,'thnIni'=>$thnIni,'thnLalu'=>$thnLalu,'duaThnLalu'=>$duaThnLalu,'tigaThnLalu'=>$tigaThnLalu,'diktiThnIni'=>$diktiThnIni,'kerjasamaThnIni'=>$kerjasamaThnIni,'semwoThnIni'=>$semwoThnIni,'pengmasThnIni'=>$pengmasThnIni,'penelitianPast'=>$penelitianPast,'kerjasamaPast'=>$kerjasamaPast,'pengmasPast'=>$pengmasPast,'seminarPast'=>$seminarPast,'peran'=>$peran,'jurnals'=>$jurnals,'jurnalPast'=>$jurnalPast]);
      }
    }
}
