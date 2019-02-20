<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peneliti;

class ApiPenelitiController extends Controller
{
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

      return response() -> json(['jmlFaperta'=>$jmlFaperta,'jmlFkh'=>$jmlFkh,'jmlFpik'=>$jmlFpik,'jmlFapet'=>$jmlFapet,'jmlFahutan'=>$jmlFahutan,'jmlFateta'=>$jmlFateta,'jmlFmipa'=>$jmlFmipa,'jmlFem'=>$jmlFem,'jmlFema'=>$jmlFema,'jmlDip'=>$jmlDip,'jmlSb'=>$jmlSb,'jmlSps'=>$jmlSps,'jmlAGH'=>$jmlAGH,'jmlIlmuTanah'=>$jmlIlmuTanah,'jmlProteksiTanaman'=>$jmlProteksiTanaman,'jmlARL'=>$jmlARL,'jmlAnatomiFisiologi'=>$jmlAnatomiFisiologi,'jmlIlmuPenyakitHewan'=>$jmlIlmuPenyakitHewan,'jmlKlinikReproduksi'=>$jmlKlinikReproduksi,'jmlBDP'=>$jmlBDP,'jmlMSP'=>$jmlMSP,'jmlTHP'=>$jmlTHP,'jmlPSP'=>$jmlPSP,'jmlITK'=>$jmlITK,'jmlIPTP'=>$jmlIPTP,'jmlINTP'=>$jmlINTP,'jmlMNH'=>$jmlMNH,'jmlHH'=>$jmlHH,'jmlKSHE'=>$jmlKSHE,'jmlSilvikultur'=>$jmlSilvikultur,'jmlTMB'=>$jmlTMB,'jmlTIP'=>$jmlTIP,'jmlSIL'=>$jmlSIL,'jmlITP'=>$jmlITP,'jmlSTK'=>$jmlSTK,'jmlGFM'=>$jmlGFM,'jmlBIO'=>$jmlBIO,'jmlKIM'=>$jmlKIM,'jmlMAT'=>$jmlMAT,'jmlKOM'=>$jmlKOM,'jmlFIS'=>$jmlFIS,'jmlBiokim'=>$jmlBiokim,'jmlIE'=>$jmlIE,'jmlMAN'=>$jmlMAN,'jmlAGB'=>$jmlAGB,'jmlESL'=>$jmlESL,'jmlGM'=>$jmlGM,'jmlIKK'=>$jmlIKK,'jmlSKPM'=>$jmlSKPM,'jmlKomunikasi'=>$jmlKomunikasi,'jmlEkow'=>$jmlEkow,'jmlManIn'=>$jmlManIn,'jmlTekKom'=>$jmlTekKom,'jmlSJMP'=>$jmlSJMP,'jmlMIJMG'=>$jmlMIJMG,'jmlTIB'=>$jmlTIB,'jmlManPerBud'=>$jmlManPerBud,'jmlManTekTer'=>$jmlManTekTer,'jmlManAGB'=>$jmlManAGB,'jmlPPPM'=>$jmlPPPM,'jmlTKJ'=>$jmlTKJ,'jmlAnKim'=>$jmlAnKim,'jmlTekManLing'=>$jmlTekManLing,'jmlAkuntansi'=>$jmlAkuntansi,'jmlPerkebunanKlpSwt'=>$jmlPerkebunanKlpSwt,'jmlProdPengPertanian'=>$jmlProdPengPertanian,'jmlParVet'=>$jmlParVet]);
    }
}
