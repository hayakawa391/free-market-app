@extends('layouts.app')

@section('css')
{{--@extends('layouts.app')と@section('css')の間は何も書かないこと！--}}
{{--トップページ用　laravel3-5--}}{{--レイアウトの指定としてresources/views/layouts/app.blade.php を参照する--}}
{{--@sectionは差し込むための部品--}}
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
{{--divはひとまとめににする枠組み「border」--}}
<div class="border">
  <ul class="border-menu">{{--ulは箇条書きリスト、liはリストの一項目。本体の上のほうになるメニュー--}}
    <li>おすすめ</li>
    <li>マイリスト</li>
  </ul>
</div>

<div class="container">{{--container:入れ物　の中にitemの枠組みを入れたい--}}
  <div class="items">{{--商品を並べて表示するところ--}}
        @foreach($items as $item){{--foreach  は、以下に記載あるものを配列やコレクションを1つずつ繰り返し処理するために使用--}}
    <div class="item">
      <a href="/item/{{$item->id}}">{{--a href="..."「...」へ移動。詳細ページへ飛ぶ--}}
        @if ($item->sold()){{--売り切れかのメソッドがtrueを返すとき--}}
        <div class="item__img--container sold">{{-- cssのsold用の表示：グレーアウト表示にする--}}
          <img src="{{ $item->img_url }}" class="item__img" alt="商品画像">

        </div> 
        @else 
          <div class="item__img--container"> {{--通常のcss表示のまま--}}
            <img src="{{ $item->img_url }}" class="item__img" alt="商品画像">
          </div> 
        @endif
          <p class="item_name">{{$item->name}}</p>{{--pは段落を変えて表示--}}
      </a>
    </div>
    @endforeach{{--本体おわり--}}
  </div>
</div>


@endsection