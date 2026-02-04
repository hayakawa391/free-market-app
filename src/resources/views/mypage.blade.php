<!--初回登録の時に個人情報登録の画面部分　Laravel3-5-->
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-form__content">
  <div class="mypage-form__heading">
    <h2>プロフィール設定</h2>
  </div>

  <form class="form" action="/mypage" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    

    {{-- ユーザー名 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">ユーザー名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}">
        </div>
        <div class="form__error">
          @error('name') {{ $message }} @enderror
        </div>
      </div>
    </div>

    {{-- 郵便番号 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="postcode" value="{{ old('postcode', $user->postcode ?? '') }}">
        </div>
        <div class="form__error">
          @error('postcode') {{ $message }} @enderror
        </div>
      </div>
    </div>

    {{-- 住所 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" value="{{ old('address', $user->address ?? '') }}">
        </div>
        <div class="form__error">
          @error('address') {{ $message }} @enderror
        </div>
      </div>
    </div>

    {{-- 建物名 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" value="{{ old('building', $user->building ?? '') }}">
        </div>
        <div class="form__error">
          @error('building') {{ $message }} @enderror
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">更新する</button>
    </div>
  </form>
</div>
@endsection
