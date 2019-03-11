<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class ApiKaryaController extends Controller
{
    public function karya()
    {
		// foreach($request->request as $row)
		// {
		// 	Karya::create([
		// 	'id' => $row['id'],
		// 	'judul' => $row['judul'],
		// 	'jenis' => $row['jenis'],
		// 	'tahun_terbit' => $row['tahun'],
		// 	'status_usulan' => $row['status'],
		// 	'angka_kredit' => $row['kredit'],
		// 	]);
		// }
    //     return response()->json([
    //       'success'=>true,
    //       'message'=>"Karya berhasil ditambahkan"
		// ]);
		$pegawai = Pegawai::get();
		$nip = $pegawai->pluck('nip');

		return response()->json([
				'nip' => $nip
		]);
		
	}
    
}
