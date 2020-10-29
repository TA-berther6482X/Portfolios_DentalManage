<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\CheckUserInfo;
use App\Http\Requests\toothRequest;
use App\Models\ToothCheck;

class ToothController extends Controller
{
    public function index()
    {
        $toothQueries = CheckUserInfo::comparetoothMine();
        
        return view('toothcheck.index', compact('toothQueries'));
    }

    public function store(toothRequest $request)
    {
        $toothcheck = new ToothCheck;
        $user = Auth::user()->user_id;
        $now = Carbon::now('JST')->format('YmdHis');
        
        $imagefile = (string)$user . (string)$now . '.jpg';
        $request->photo->storeAs('public/tooth_images', $imagefile);
        $toothcheck->user_id = Auth::user()->user_id;
        $toothcheck->image = $imagefile;
        $toothcheck->comment = $request->input('comment');
        
        $toothcheck->save();

        return redirect('/')->with('status', '新しい情報を登録しました');
        
    }

    public function show($id)
    {
        //$toothcheck = ToothCheck::find($id);
        $user = Auth::user();
        $toothcheck = DB::table('tooth_checks')
        ->where('user_id', $user->user_id)
        ->where('id', $id)
        ->first();
        
        if(isset($toothcheck)) {
            return view('toothcheck.show', compact('toothcheck'));
        } else {
            return redirect('/');
        }


        
    }

}
