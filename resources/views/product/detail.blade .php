
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
        <td>{{ $product->id }}</td>
        <td>{{ $product->img_path }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->price }}円</td>
        <th>{{ $product->stock }}</td>
        <td>{{ $product->company_id}}</td>
    </div>
</div>
@endsection