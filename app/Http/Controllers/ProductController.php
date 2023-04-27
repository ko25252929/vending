<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Company;
use App\Http\Requests\ProductRequest;
use App\Models\Home;
use App\Models\User;

class ProductController extends Controller
{

    /**
     * 詳細
     * @param int $id
     * @return view
     */
    public function showDetail($id) 
    {
        
        $product = Product::find($id);
      
        if (is_null($product)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('home'));
        }     
        return view('detail', ['product' => $product]);
    }

     /**
     * 登録画面表示
     * @return view
     */
    public function showCreate() {
     $companies = Company::all();
     return view('form', compact('companies'));
    } 

     /**
     * 商品登録
     * @return view
     */
    public function exeStore(Request $request) 
    {

        $request->company_id;
        $inputs = $request->all(); 

        /**画像をpublicに配置する為の処理 */
        if(request('img_path')){
            
            $filename = $request -> file('img_path');
            $inputs['img_path'] = $filename -> storeAs('public/images', $filename);
      
        \DB::beginTransaction();
        }

       try{
        Product::create($inputs);
        \DB::commit();
       } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
       }
        \Session::flash('err_msg','商品登録しました');
        return redirect(route('home'));
    } 



    
    /**
     * 商品編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id) 
    {
        $product = Product::find($id);
        $companies= Company::all();
        
        if (is_null($product)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('home'));
        }     
        return view('edit', compact('product','companies'));
    }




      /**
     * 編集から商品を更新する
     * @return view
     */
    public function exeUpdate(ProductRequest $request) 
    {
        //データを受け取る
       $inputs = $request->all();
       $product = Product::find(1);
       $companies= Company::all();

       /**画像をpublicに配置する為の処理 */
       if(request('img_path')){
        $filename = $request -> file('img_path');
        \Storage::disk('public')->delete($inputs);
        $inputs['img_path'] = $filename -> storeAs('public/images', $filename);
       }else{ 
        $inputs = null;
    }
    /* *
     * 商品更新登録する
     */
        \DB::beginTransaction();
    
        $product = Product::find($inputs['id']);
        // try{
        $product->update([
            'id' => $inputs['id'],
            'company_id' => $inputs['company_id'],
            'product_name' => $inputs['product_name'],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'comment'=> $inputs['comment'],
            'img_path' => $inputs['img_path'],
            ]);


            $product->save();
            \DB::commit();
            // } 
            // catch(\Throwable $e) {
            //     \DB::rollback();
            //     abort(500);
            // }
            \Session::flash('err_msg','商品を更新しました');
            return redirect(route('home'));
       }
     

    /**
     * 削除処理
     * @param int $id
     * @return view
     */
       public function exeDelete($id)
       {
        if(empty($id)) {
            \Session::flash('err_msg','データがありません。');
           return redirect(route('home'));
        }
        try{
            Product::destroy($id);
        }   catch(\Throwable $e) {
                abort(500);
        }
           \Session::flash('err_msg','データ削除しました');
           return redirect(route('home'));
       }
}
