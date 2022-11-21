
<!-- 
①route作成（削除ボタン）
②Controllerづくり
③削除機能づくり
 -->
 @extends('layout')
 @section('title','商品詳細')
 @section('content')
 
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>{{$product->title}}</h2>
        <span>{{$product->product-name}}</span>
        <span>{{$product->price }}</span>
        <span>{{$product->stock}}</span>
        <span>{{$product->img_path}}</span>
        <span>{{$product->comment}}</span>
        <span>{{$product->created_at}}</span>
        <span>{{$product->updated_at}}</span>
    </div>
</div>
@endsection