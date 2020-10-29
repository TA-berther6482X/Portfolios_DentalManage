<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calendar;
use App\Services\CheckUserInfo;

class HomeController extends Controller
{
    public function intro()
    {
        return view('home.intro');
    }

    public function index()
    {
        $query = CheckUserInfo::compareResMine();
        $timeCategory = Calendar::checkTimeCategory($query);

        $toothQueries = CheckUserInfo::comparetoothMine();
        
        return view('home.index', compact('query', 'timeCategory', 'toothQueries'));
    }
}
