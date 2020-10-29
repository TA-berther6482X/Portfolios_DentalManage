<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserInfo
{

  public static function checkGender($data) {
    
    if ($data->gender === 0) {
      return '男性';
    } else {
      return '女性';
    }
  }
  
  public static function compareResMine() {
    $data = DB::table('reservation_models')->get();
    $user = Auth::user();
    $data = $data->where('user_id', $user->user_id)->first();

    return $data;
  }

  public static function comparetoothMine() {
    
    $user = Auth::user();
    $data = DB::table('tooth_checks')
    ->where('user_id', $user->user_id)
    ->orderBy('created_at', 'desc')
    ->paginate(12);

    return $data;
  }
}