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
     $companies = $this->company_id->get();
     return view('form');
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
            dd($e);
            abort(500);
       }
        \Session::flash('err_msg','商品登録しました');
        return redirect(route('home'));
    } 



    
    /**
     * 商品編集
     * @param int $id
     * @return view
     */
    public function showEdit($id) 
    {
        
        $product = Product::find($id);

        if (is_null($product)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('home'));
        }     
        return view('edit', ['product' => $product]);
    }




      /**
     * 商品編集更新
     * @return view
     */
    public function exeUpdate(ProductRequest $request) 
    {
       $inputs = $request->all();
        dd($inputs);
    
    /**画像をpublicに配置する為の処理 */
    if(request('img_path')){
        $filename = $request -> file('img_path');
        $inputs['img_path'] = $filename -> storeAs('public/images', $filename);

        \DB::beginTransaction();
    }

    /* *
     * 商品更新登録する
     */
       try{
        $product = Product::find($inputs['id']);
        $product->fill([
            'id' => $inputs['id'],
            'company_id' => $inputs['company_id'],
            'product_name ' => $inputs['product_name '],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'comment'=> $inputs['comment'],
            'img_path' => $inputs['img_path'],
            ]);

            $product->save();
            \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                abort(500);
            }
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
