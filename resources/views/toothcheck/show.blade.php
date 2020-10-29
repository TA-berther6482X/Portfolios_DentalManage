@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">検診結果</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif

            <section class="cardToothCheck">
              <figure class="figure">
                <img src="/storage/tooth_images/{{ $toothcheck->image  }}" class="toothFigure" alt="{{ $toothcheck->image  }}">
              </figure>

              <table class="table table-striped">
                <tr>
                  <th scope="row">ユーザー番号</th>
                  <td>{{ $toothcheck->user_id }}</td>
                </tr>
                <tr>
                  <th scope="row">登録日</th>
                  <td>{{ $toothcheck->created_at }}</td>
                </tr>
                <tr>
                  <th scope="row" colspan="2">診断コメント :<br><span class="toothComment">{{ $toothcheck->comment }}</span></th>
                </tr>
              </table>
            </section>
          </div>
        </div>
      </div>
      <div class="goToIndex">
        <a href="{{ url('/') }}"  class="btn btn-secondary btn-lｆg">戻る</a>
      </div>
  </div>
</div>
@endsection