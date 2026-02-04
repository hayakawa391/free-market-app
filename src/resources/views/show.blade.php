@extends('layouts.app')
{{--商品の詳細ページ--}}
@section('content')
<div style="max-width:800px;margin:40px auto;display:flex;gap:40px;">

  <div>
    <img src="{{ $item->img_url }}" style="width:350px;border-radius:8px;">
    @if($item->sold_out)
      <p style="color:red;font-weight:bold;margin-top:10px;">SOLD OUT</p>
    @endif
  </div>

  <div>
    <h1>{{ $item->name }}</h1>
    <p style="font-size:20px;">¥{{ number_format($item->price) }}</p>

    @if(!$item->sold_out)
    <form action="/item/{{ $item->id }}/buy" method="post">
    @csrf
        <button style="
        margin-top:20px;
        padding:12px 30px;
        background:red;
        color:white;
        border:none;
        ">
        購入手続きへ
        </button>
    </form>
    @else
    <p style="color:red;font-weight:bold;">SOLD OUT</p>
    @endif
  </div>

</div>
@endsection
