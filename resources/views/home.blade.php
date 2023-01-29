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
    
        

        <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <div>
            <button type="submit">検索</button>
            <button>
                    クリア
                </a>
            </button>
        </div>
    </form>


    <select type="select_search" placeholder="会社名" name="select_search" value="@if (isset($search)) {{ $search }} @endif">
    <option value="">メーカー名を選択してください</option>
    </select> 
    <div>
            <button type="submit">検索</button>
            <button>
                    クリア
                </a>
            </button>
        </div>
    </form>

        <table class="table table-striped">
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
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{asset('storage/images'.$product->img_path)}}" style="height:300px"></td>
                <td><a href="/product/{{ $product->id }}">{{ $product->product_name }}</a></td>
                <td>{{ $product->price }}円</td>
                <th>{{ $product->stock }}</td>
                <td>{{ $product->company_id}}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='/product/{{$product->id}}'" >詳細</button></td>
                
                <td><form action="{{ route('delete', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" onclick=>削除</button>
                 </form>
                </td>
            </tr>
            <!-- <form method="POST" action="{{ route('delete', $product->id) }}" onSubmit="return checkDelete()">
                @csrf
                <td><button type="submit" class="btn btn-danger" onclick=>削除</button><
                </form>
                /td>
            </tr> -->
            @endforeach
        </table>
    </div>
</div>
@endsection

  
