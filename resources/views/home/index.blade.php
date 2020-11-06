@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">ダッシュボード</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <section class="reservatgionTitle">
            <table class="table">
              <thead class="tablehead">
                <tr>
                  <th scope="col">予約希望日</th>
                  <th scope="col">予約希望時間</th>
                  <th scope="col">申し込み日時</th>
                  <th scope="col">予約状況</th>
                  <th scope="col" class="columnleft">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                @if(isset($query))
                  <th>{{ $query->date }}</th>
                  <td>{{ $timeCategory }}</td>
                  <td>{{ $query->created_at }}</td>
                  <td>{{ $query->status }}</td>
                  <td class="revleft"><a class="btn btn-primary" href="{{ route('reservation.index') }}">予約画面へ</a></td>
                @else
                  <th colspan="4">予約がありません</th>
                  <td class="revleft"><a class="btn btn-primary" href="{{ route('reservation.index') }}">予約画面へ</a></td>
                @endif
                </tr>
              </tbody>
            </table>
          </section>
          
          <section class="toothTitle">
            <table class="table">
              <thead class="tablehead">
                <tr>
                  <th scope="col">登録日時</th>
                  <th scope="col">診断コメント</th>
                  <th scope="col">詳細</th>
                </tr>
              </thead>
              <tbody>
                @foreach($toothQueries as $toothQuery)
                <tr>
                  <th>{{ $toothQuery->created_at }}</th>
                  <td>{{ Str::limit($toothQuery->comment, 60) }}</td>
                  <td><a href="{{ route('toothcheck.show', ['id' => $toothQuery->id]) }}">詳細をみる</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination">{{ $toothQueries->links() }}<div>
          </section>
          
          <div class="settingMenus">
            <a class="contactTitle btn btn-lg btn-outline-primary" href="{{ route('contact.create') }}">お問い合わせ</a>
            <a class="userinfoTitl btn btn-lg btn-outline-primary" href="{{ route('userinfo.show') }}">登録情報の確認または変更</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection