@extends('layouts.app')

@section('content')
<!-- $calendardates = [$daysMonth, $prevY, $prevM, $todayY, $todayM, $nextY, $nextM] -->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <div class="card-header calenderTitle"><span>予約カレンダー</span>
            <div class="calenderblock">
              <div class="calenderLeft">{{ $data->year }}年 {{ $data->month }}月</div>
              <a href="{{ route('reservation.index', [ 'y' => $calendardates[5], 'm' => $calendardates[6], ]) }}"
                class="btn btn-primary">次月</a>
              <a href="{{ route('reservation.index', [ 'y' => $calendardates[3], 'm' => $calendardates[4], ]) }}"
                class="btn btn-primary">今日</a>
              <a href="{{ route('reservation.index', [ 'y' => $calendardates[1], 'm' => $calendardates[2], ]) }}"
                class="btn btn-primary">前月</a>
            </div>
          </div>

          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table class="table revTable">
            <thead>
              <tr class="revWidth">
                @foreach($headings as $heading)
                <th scope="col" class="header">{{ $heading }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                @for($i = 1; $i <= $calendardates[0]; $i++)
                  @if($i===1)
                    @if($data->format('w') != 0)
                    <th colspan="{{ $data->format('w') }}"></th>
                    @endif
                  @endif

                  <td id="checkDay{{ $i }}" class="day">
                    <a href="{{ route('reservation.show', [ 'pointDate' => $data->format('Ymd'), ]) }}">{{ $data->day }}</a>
                  </td>
                  
                  @if($today->format('Ymd') === $data->format('Ymd'))
                  <script>document.getElementById('checkDay{{ $i }}').classList.add('today');</script>
                  @endif

                  @if(isset($query))
                    @if(date("Ymd", strtotime($query->date)) === $data->format('Ymd'))
                    <script>
                      var divToday = '<div class="divToday">予約日</div>';
                      document.getElementById('checkDay{{ $i }}').classList.add('revDay');
                      document.getElementById('checkDay{{ $i }}').insertAdjacentHTML('beforeend', '<div class="divToday">予約日</div>');
                    </script>
                    @endif
                  @endif

                  @if($data->format('w') == 0)
                  <script>document.getElementById('checkDay{{ $i }}').classList.add('sunday');</script>
                  @elseif($data->format('w') == 6)
                  <script>document.getElementById('checkDay{{ $i }}').classList.add('saturday');</script>
                  @endif

                  @if($data->addDays()->format('w') == 0)
                  </tr><tr>
                  @endif
                @endfor
              </tr>
            </tbody>
          </table>

        </div>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">予約希望日</th>
            <th scope="col">予約希望時間</th>
            <th scope="col">申し込み日時</th>
            <th scope="col">予約状況</th>
            <th scope="col">操作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @if(isset($query))
            <th>{{ $query->date }}</th>
            <td>{{ $timeCategory }}</td>
            <td>{{ $query->created_at }}</td>
            <td>{{ $query->status }}</td>
            <td><form method="POST" id="delete_{{ $query->id }}" action="{{ route('reservation.destroy', ['id' => $query->id]) }}">
              @csrf
              <a href="#" class="btn btn-secondary" data-id="{{ $query->id }}" onclick=deleteReservation(this);>予約を取り消す</a>
            </form></td>
          @else
            <th colspan="5">予約がありません</th>
          @endif
          </tr>
        </tbody>
      </table>

      <div class="goToIndex needSpace">
        <a href="{{ url('/') }}" class="btn btn-outline-dark btn-large">Homeへ戻る</a>
      <div>
    </div>
  </div>
</div>

<script>
function deleteReservation(e) {
  'use strict';
  if(confirm('本当に削除してよろしいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>
@endsection