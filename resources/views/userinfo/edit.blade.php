@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">登録情報の変更</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <form method="POST" id="change_form" action="{{ route('userinfo.update') }}">
            @csrf
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


            <div class="border-top"></div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメール アドレス') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  placeholder="{{ $user->email }}" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" id="com2" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                  autocomplete="new-password">
              </div>
            </div>

            <div class="goToIndex">
              <a href="{{ url('/') }}"  class="btn btn-secondary">戻る</a>
              <a href="#" class="btn btn-primary" onclick="changeForm(this);">情報を更新する</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
function changeForm(e) {
  if (document.getElementById('email').value == "" && document.getElementById('password').value == "")  {
    'use strict'
    alert('変更された情報がありません');
  } else {
    document.getElementById('change_form').submit();
  }
}
</script>
@endsection