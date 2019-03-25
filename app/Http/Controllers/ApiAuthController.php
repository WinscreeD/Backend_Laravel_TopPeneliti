<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class ApiAuthController extends Controller
{
  public function login(Request $request, User $user)
  {
      if(!Auth::attempt(['username' => $request->username, 'password' => $request->password]))
      {
          return response()->json(['error' => 'Username atau password salah'], 401);
      }
      $user = $user->find(Auth::user()->id);
      if($user->api_token==NULL){
        $user->api_token = bcrypt($request->username);
        $user->save();
      }
      $data_user = $user;
      $users = Auth::user()->user_si;

      return response()->json([
        'success'=>true,
        'message'=>"Berhasil login",
        'data_user'=>$data_user,
        'role'=>$users
      ]);

  }
//   public function user_check(){
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
}
