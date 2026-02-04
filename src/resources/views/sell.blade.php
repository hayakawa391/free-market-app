@extends('layouts.app')

@section('content')
<h1>商品の出品</h1>

<form action="/sell" method="post">
 @csrf
 <input type="text" name="img_url" placeholder="画像URL">
 <input type="text" name="status"placeholder="商品の状態">
 <input type="text" name="category" placeholder="カテゴリー">
 <input type="text" name="name" placeholder="商品名">
 <input type="text" name="brand" placeholder="ブランド名">
 <textarea name="description" placeholder="商品の説明"></textarea>
 <input type="number" name="price" placeholder="価格">
 

 @if ($errors->any())
  <div>
    @foreach ($errors->all() as $error)
      <p style="color:red">{{ $error }}</p>
    @endforeach
  </div>
@endif


 <button type="submit">出品する</button>
</form>
@endsection
