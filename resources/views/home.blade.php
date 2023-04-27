@extends('layouts.app')
@section('title','自動販売機')
@section('content')

<header>
    @include('header')
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>ドリンク一覧</h2>
        @if(session('err_msg'))
            <p class="text-danger">
              {{session('err_msg')}}
            </p>
        @endif
</div>
    
    <!-- 商品名で検索機能 -->
    <div>
      <form method="get" action="{{ route('search') }}" class="form-inline">
            <div class="form-group">
            <input type="text" name="keyword" class="form-control"  placeholder="商品名を入力して下さい" style="margin-left: 30px;" value="@if (isset($keyword)) {{ $keyword }} @endif">
             <select type="select_search" style="margin-left: 15px; height: 35px;" placeholder="会社名" name="select_search"  value="@if (isset($select_search)) {{ $select_search }} @endif">
                <option value="" selected="selected" >会社名を選択してください。</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px;color:white; height: 35px;">
            </div>
      </form>
    </div>

        

        <table class="table table-striped" style="margin-left: 15px">
            <tr>
                <th>ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>メーカー名</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach($products as $product )
            <tr>
                <td>{{ $product->id }}</td>
                <td class="dbconect"><img src="{{asset(\Storage::url($product -> img_path))}}"alt="" class="products-image"  width="100" height="200"></td>
                <td><a href="/product/{{ $product->id }}">{{ $product->product_name }}</a></td>
                <td>{{ $product->price }}円</td>
                <th>{{ $product->stock }}</td>
                <td>{{ $product->companies->company_name }}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='/product/{{$product->id}}'" >詳細</button></td>
                
                <td><form action="{{ route('delete', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" onclick=>削除</button>
                 </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

  
