@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">お問合せフォーム</div>

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

          <form method="POST" action="{{ route('contact.store') }}">
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
              <label for="contact_category" class="col-md-4 col-form-label text-md-right">{{ __('お問い合わせ種別') }}</label>
              <div class="col-md-6">
                <select class="custom-select d-block w-100" name="contact_category">
                  <option value="">選択してください 必須</option>
                  <option value="1">ご予約について</option>
                  <option value="2">治療内容、費用について</option>
                  <option value="3">メディア</option>
                  <option value="4">登録したアカウント情報について</option>
                  <option value="5">その他のお問い合わせ</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="contents" class="col-md-4 col-form-label text-md-right">{{ __('お問い合わせ内容') }}</label>
              <div class="col-md-6"><textarea class="form-control" name="contents" placeholder="こちらにお問い合わせ内容を入力してください。"></textarea></div>
            </div>

            <div class="form-group row form-check">
              <input type="checkbox" class="form-check-input" id="sampleCheck1" name="caution" value="1">
              <label class="form-check-label" for="sampleCheck1">注意事項に同意する</label>
            </div>

            <div class="goToIndex">
              <a href="{{ url('/') }}"  class="btn btn-secondary">戻る</a>
              <input class="btn btn-info" type="submit" value="登録する">
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection