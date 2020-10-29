<?php

namespace App\Services;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Calendar
{

  public static function renderCalendar($data, $today) {
    
    $todayY = $today->year;
    $todayM = $today->month;

    $sub = (Carbon::createFromDate($data->year, $data->month, $data->day))->submonth();
    $add = (Carbon::createFromDate($data->year, $data->month, $data->day))->addmonth();
    
    $daysMonth = $data->daysInMonth;
    $prevY = $sub->year;
    $prevM = $sub->month;
    $nextY = $add->year;
    $nextM = $add->month;

    $calendardates = [$daysMonth, $prevY, $prevM, $todayY, $todayM, $nextY, $nextM];

    return [$daysMonth, $prevY, $prevM, $todayY, $todayM, $nextY, $nextM];

  }

  public static function checkTimeCategory($query) {
    if(isset($query)) {
      if($query->time_category === 1) {
        return '10:00~';
      }
      if($query->time_category === 2) {
        return '11:00~';
      }
      if($query->time_category === 3) {
        return '13:00~';
      }
      if($query->time_category === 4) {
        return '14:00~';
      }
      if($query->time_category === 5) {
        return '15:00~';
      }
      if($query->time_category === 6) {
        return '16:00~';
      }
      if($query->time_category === 7) {
        return '17:00~';
      }
      return null;
    }
  }
}