<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Company;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**一覧画面
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all(); 
        $companies = Company::all();
        
        return view('home', compact('products','companies'));

    }
        

    // 検索機能
    public function search(Request $request)
    {
        $keyword = $request->input("keyword");
        $select_search = $request->input("select_search");
        
        $query1 = Product::query();
        $companies = Company::all();


        if(!empty($keyword))
        {
            $query1->where('product_name','like','%'.$keyword.'%');
        }

        if(!empty($select_search))
        {
            $query1->where('company_id','like','%'.$select_search.'%');
        }
        

        $products = $query1->orderBy('id','desc')->paginate(5);
       
        return view('home',compact('products','companies','keyword','select_search'));
    }

  
   
}
