<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Home;

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
        return view('product.detail', ['product' => $product]);
    }

     /**
     * 登録画面表示
     * @return view
     */
    public function showCreate() {
     return view('product.form');
    } 

     /**
     * 商品登録
     * @return view
     */
    public function exeStore(ProductRequest $request) 
    {
       $inputs = $request->all();
       \DB::beginTransaction();


    
    /**画像をpublicに配置する為の処理 */
     if(isset($request['img_path'])){
        $inputs['img_path'] = $request['img_path']->store('public/images');
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
        return view('product.edit', ['product' => $product]);
    }

      /**
     * 商品更新する
     * @return view
     */
    public function exeUpdate(ProductRequest $request) 
    {
       $inputs = $request->all();
       \DB::beginTransaction();
    
       dd($request);
    /**画像をpublicに配置する為の処理 */
    if(isset($request['img_path'])){
        dd('test');
        $name=request()->file("image")->getClientOriginalName();
        $inputs['img_path'] = $request->file('image')->store('public/images/' . $name);
    }

    /* *
     * 商品更新登録する
     */
       try{
        $product = Product::find($inputs['id']);
        $product->fill([
            'id' => $inputs['id'],
            'img_path' => $inputs['img_path'],
            'product_name ' => $inputs['product_name '],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'company_id' => $inputs['company_id'],
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
/* *
     * 削除処理
     */
       public function destroy($id)
       {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
       }
}
