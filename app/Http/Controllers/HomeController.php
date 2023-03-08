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
        
        return view('home', compact('products'));
        
        $keyword = $rp->input("keyword");
        $query = \APP\Student::query();

        if(!empty($keyword))
        {
            $query->where('product_name','like','%'.$keyword.'%');
            $query->onWhere('company_name','like','%'.$keyword.'%');

        }

        $products = $query->orderBy('id','desc')->paginate(5);
        return view('home')->with('product',$products)->with('keyword',$keyword);
        
    }
   
}
