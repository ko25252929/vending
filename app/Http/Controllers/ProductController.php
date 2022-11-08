<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * ブログ一覧
     * 
     * @return viw
     */
    public function showList() 
    {
        $products = Product::all();

        
        return view('product.list',
        ['products' => $products]);
    }
}
