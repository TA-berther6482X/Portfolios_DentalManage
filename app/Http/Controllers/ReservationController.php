<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\reservationRequest;
use App\Services\Calendar;
use App\Services\CheckUserInfo;
use App\Models\ReservationModel;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = CheckUserInfo::compareResMine();
        $timeCategory = Calendar::checkTimeCategory($query);

        $data = Carbon::createFromDate()->startOfMonth();
        $data->timezone = 'Asia/Tokyo';
    
        $today = Carbon::today();
        $today->timezone = 'Asia/Tokyo';

        if(isset($request)){
            $data = Carbon::createFromDate($request->input('y'), $request->input('m') ,01);
        }

        $calendardates = Calendar::renderCalendar($data, $today);
        $headings = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saterday'];

        return view('reservation.index', compact('today', 'data','calendardates', 'headings', 'query', 'timeCategory'));
    }

    public function show(Request $request)
    {
        $today = Carbon::today();
        $today->timezone = 'Asia/Tokyo';
        $today = date('Ymd',strtotime($today));
        $today = (int)$today;

        $date = date('Ymd',strtotime($request->input('pointDate')));
        $compareDate = (int)$date;

        if(CheckUserInfo::compareResMine()) {
            return redirect('reservation/')->with('status', 'すでに予約申し込みしている場合は、追加で予約をすることが出来ません。');
        }
    
        if($today + 1 >= $compareDate) {
            return redirect('reservation/')->with('status', '本日から2日後以降の日付をお選びください。');
        }

        $date = date('Y-m-d',strtotime($date));
        $user = Auth::user();
        
        return view('reservation.show', compact('date', 'user'));

    }

    public function store(reservationRequest $request)
    {
        $reservation = new ReservationModel;

        $reservation->user_id = $request->input('user_id');
        $reservation->your_name = $request->input('your_name');
        $reservation->email = $request->input('email');
        $reservation->date = $request->input('date');
        $reservation->time_category = $request->input('time_category');
        $reservation->status = '予約申し込み依頼中';
    
        $reservation->save();

        return redirect('reservation/')->with('status', '予約申込依頼を送信しました。予約確定後に画面のステータスが変更されます。');
    }

    public function destroy($id)
    {
        $revervationDelete = ReservationModel::find($id);
        $revervationDelete->delete();

        return redirect('reservation/')->with('status', '予約を削除しました。');
    }
}