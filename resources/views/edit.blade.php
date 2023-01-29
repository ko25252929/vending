@extends('layouts.app')
@section('title','編集')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}"  enctype="multipart/form-data">
        @csrf

        <!--カンパニー -->
            <input type="hidden" name="id" value="{{ $product->id }}">
            
            <div class="form-group">
                <label for="company_id">
                    メーカー
                </label>
                <select
                    id="company_id"
                    name="company_id"
                    class="form-control"
                    value="{{ $product->company_id }}"
                    select name="company_id"
                >
                 <option value="1">コカ・コーラ</option>
                 <option value="2">サントリー</option>
                 <option value="3">アサヒ飲料</option>
                 <option value="4">キリン</option>
                 <option value="5">伊藤園</option>
                </select>
                @if ($errors->has('company_id'))
                    <div class="text-danger">
                        {{ $errors->first('company_id') }}
                    </div>
                @endif
                
        <!--商品名 -->
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ $product->product_name }}"
                    type="text"
                >
                @if ($errors->has('product_name'))
                    <div class="text-danger">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
        <!--値段-->
                <div class="form-group">
                <label for="price">
                    値段
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="{{  $product->price  }}"
                    type="text"
                >
                @if ($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
        <!--在庫 -->
        <div class="form-group">
                <label for="stock">
                    在庫
                </label>
                <input
                    id="stock"
                    name="stock"
                    class="form-control"
                    value="{{ $product->stock }}"
                    type="text"
                >
                    @if ($errors->has('stock'))
                    <div class="text-danger">
                        {{ $errors->first('stock') }}
                    </div>
                @endif
            </div>
        <!--コメント -->
            <div class="form-group">
                <label for="comment">
                    コメント
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    rows="4"
                >{{ $product->comment }}</textarea>
                @if ($errors->has('comment'))
                    <div class="comment">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
        <!--画像-->
            <div class="form-group">
                <label for="img_path">
                商品画像
                </label>
                <input
                    id="img_path"
                    name="img_path"
                    class="form-control"
                    value="{{ $product->img_path }}"
                    type="file"
                >
                @if ($errors->has('img_path'))
                    <div class="img_path">
                        {{ $errors->first('img_path') }}
                    </div>
                @endif

           <div class="mt-5">   
            <a class="btn btn-primary" href="{{
            route('home')}}">        
            戻る</a>
            </button>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection