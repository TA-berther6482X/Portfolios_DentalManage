@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">登録情報の確認</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <div class="form-group row">
            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー番号') }}</label>
            <div class="col-md-6"><input type="text" class="form-control" name="user_id" readonly value="{{ $user->user_id }}"></div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>
            <div class="col-md-6"><input type="text" class="form-control" name="name" readonly value="{{ $user->name }}"></div>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>
            <div class="col-md-6"><input type="text" class="form-control" name="gender" readonly value="{{ $gender }}"></div>
          </div>

          <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>
            <div class="col-md-6"><input type="number" class="form-control" name="age" readonly value="{{ $user->age }}"></div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>
            <div class="col-md-6"><input type="text" class="form-control" name="address" readonly value="{{ $user->address }}"></div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>
            <div class="col-md-6"><input type="tel" class="form-control" name="phone" readonly value="{{ $user->phone }}"></div>
          </div>

          <div class="goToIndex">
            <a href="{{ url('/') }}" class="btn btn-secondary">戻る</a>
            <a href="{{ route('userinfo.edit') }}" class="btn btn-primary">Eメール パスワードの変更</a>
          </div>

          <div class="caution">
            <h5><p>*登録情報でご不明な点があれば、
            <a href="{{ action('ContactFormController@create') }}">お問合せフォーム</a>
            よりお気軽にご連絡ください。</p></h5>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection