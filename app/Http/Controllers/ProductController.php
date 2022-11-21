<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * 商品一覧
     * 
     * @return view
     */
    public function showList() 
    {
        $products = Product::all();

        
        return view('product.list',
        ['products' => $products]);
    }

    /**
     * 商品詳細
     * @param int $id
     * @return view
     */
    public function showDetail($id) 
    {
        $product = Product::find($id);

        if (is_null($product)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('products'));
        }
        
        return view('product.detail', ['product' => $product]);
    }
}
