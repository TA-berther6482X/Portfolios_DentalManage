@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">検診結果</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form method="POST" action="{{ route('toothcheck.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('画像アップロード') }}</label>
              <div class="col-md-6"><input type="file" name="photo"></div>
            </div>

            <div class="form-group row">
              <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('診断コメント') }}</label>
              <div class="col-md-6"><textarea class="form-control" name="comment" placeholder="診断コメント"></textarea></div>
            </div>

            <div class="goToIndex">
              <input class="btn btn-info" type="submit" value="登録する">
            </div>
          </form>

          <table class="table">
            <thead>
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
          <div class="pagination">{{ $toothQueries->links() }}</div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection