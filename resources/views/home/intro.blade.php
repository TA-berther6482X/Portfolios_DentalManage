@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">サイト紹介</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <section class="introduct">
            <h2>ようこそ！</h2><br>
            <p class="introChar">
              <span>DentalManage(デンタルマネージ)</span>はオンライン上で、<br>
              歯医者の予約、クリーニングの診断結果、問い合わせを行える総合管理サイトです。<br>
              <br>
              健康な歯にするためのお手伝いをさせていただきます。<br>
            </p>
            
            <div class="auth-item goToIndex">
              <a class="authlink btn btn-primary" href="{{ route('login') }}">ログインする</a>
              <a class="authlink btn btn-primary" href="{{ route('register') }}">新規登録する</a>
            </div>
            
            <figure class="figure">
              <img src="storage/tooth_images/haisya.png" class="toothFigure" alt="歯医者のイメージ画像">
            </figure>
          
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection