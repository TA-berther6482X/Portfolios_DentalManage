@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">予約の申し込み</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </div>
          @endif

          <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <div class="form-group row">
              <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー番号') }}</label>
              <div class="col-md-6"><input type="text" class="form-control" name="user_id" readonly value="{{ $user->user_id }}"></div>
            </div>

            <div class="form-group row">
              <label for="your_name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>
              <div class="col-md-6"><input type="text" class="form-control" name="your_name" readonly value="{{ $user->name }}"></div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
              <div class="col-md-6"><input type="email" class="form-control" name="email" value="{{ $user->email }}"></div>
            </div>

            <div class="form-group row">
              <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('予約希望日') }}</label>
              <div class="col-md-6"><input type="date" name="date" value="{{ $date }}"></div>
            </div>

            <div class="form-group row">
              <label for="time_category" class="col-md-4 col-form-label text-md-right">{{ __('予約希望時間') }}</label>
              <div class="col-md-6">
                <select class="custom-select d-block w-100" name="time_category">
                  <option value="">選択してください 必須</option>
                  <option value="1">10:00~</option>
                  <option value="2">11:00~</option>
                  <option value="3">13:00~</option>
                  <option value="4">14:00~</option>
                  <option value="5">15:00~</option>
                  <option value="6">16:00~</option>
                  <option value="7">17:00~</option>
                </select>
              </div>
            </div>

            <div class="form-group row form-check caution">
                <input type="checkbox" class="form-check-input" id="sampleCheck2" name="caution" value="1">
                <label class="form-check-label" for="sampleCheck2">注意事項に同意する</label>
            </div> 

            <div class="goToIndex">
              <a href="{{ route('reservation.index') }}"  class="btn btn-secondary">戻る</a>
              <input class="btn btn-info" type="submit" value="登録する">
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection