
<!-- 
①route作成（削除ボタン）
②Controllerづくり
③削除機能づくり
 -->
 @extends('layouts.app')
 @section('title','商品詳細')
 @section('content')

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="{{route('home')}}">ドリンク一覧 <span class="sr-only"></span></a>
     </div>
  </div>
</nav>

 <table class="table table-striped">
     <tr>
        <th>ID</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>メーカー名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>コメント</th>
        <th>編集</th>
        <th>戻る</th>
     </tr>
 
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <td>{{ $product->id }}</td>
        <td class="dbconect"><img src="{{asset(\Storage::url($product -> img_path))}}"alt="" class="products-image"  width="100" height="200"></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->company_id}}</td>
        <td>{{ $product->price }}円</td>
        <th>{{ $product->stock }}</td>
        <th>{{ $product->comment }}</td>
    </div>
    <td><button type="button" class="btn btn-primary" onclick="location.href='/edit/{{$product->id}}'" >編集</button>
    <td> <button type="button"class="btn btn-primary" onclick="location.href='{{route('home')}}'">  戻る</button>
</div>
@endsection