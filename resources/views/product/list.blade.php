
<!-- 
①route作成（削除ボタン）
②Controllerづくり
③削除機能づくり
 -->
 @extends('layout')
 @section('title','自動販売機')
 @section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>ドリンク一覧</h2>
            <p class="text-danger">
            </p>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>商品名</th>
                <th>値段</th>
                <th>在庫</th>
                <th>商品画像</th>
                <th>メーカー</th>
                <th>更新日時</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->company_id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <th>{{ $product->stock }}</td>
                <td>{{ $product->img_path }}</td>
                <th>{{ $product->company }}</td>
                <td>{{ $product->updated_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection