<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required | max:255',
            'company_id' => 'required',
            'price' => 'required | regex:/^[!-~]+$/',
            'stock' => 'required | regex:/^[!-~]+$/',
            'img_path' => '',
        ];

        $message = [
            'product_name' => '名前を入力してください',
            'company_id' => '会社名を選択してください',
            'price' => '半角数字を入力してください',
            'stock' => '半角数字を入力してください',
          ];
        
          $validator = Validator::make($request->all(), $rulus, $message);
        
          if ($validator->fails()) {
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
          }
          return view('/',['msg'=>'正しく入力されました!']);
        }
    }


