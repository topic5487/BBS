@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-8 offset-md-2">

    <div class="card">
      <div class="card-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 編輯個人資料
        </h4>
      </div>

      <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          @include('shared._errors')

          <div class="mb-3">
            <label for="name-field">姓名</label>
            <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
          </div>
          <div class="mb-3">
            <label for="email-field">電子郵件</label>
            <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
          </div>
          <div class="mb-3">
            <label for="introduction-field">個人簡介</label>
            <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
          </div>
          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">確定</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
