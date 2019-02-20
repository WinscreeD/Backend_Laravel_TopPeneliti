<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DownloadUserGuideController extends Controller
{
  public function getDownload(){
    
    $file= public_path(). "/file/PetunjukPenggunaan.pdf";
    $headers = [
              'Content-Type' => 'application/pdf',
              ];
    return Response()->download($file, 'petunjuk_penggunaan.pdf', $headers);
    }
}