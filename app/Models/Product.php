<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public $timestamp = false;
    protected $table = 'products';
    protected $fillable =
    [
        'company_id',
        'product_name',
        'price'	,
        'stock'	,
        'comment',	
        'img_path',
    ];

    public function deleteProductById($id)
    {
        return $this->destroy($id);
    }

    public function join(){ 
    $product =Product::product()
    -> join('companies', 'products.company_id', '=', 'companies.id')
    ->select('products_id as product_id','companies.id as company_id','product_name','price',
             'stock','img_path','company_name');
    return $product;
    }

    public function Sales()
    {
     return $this->hasMany('App\Models\Sale');
    }
    public function Companies()
    {
     return $this->belongsTo('App\Models\Company','company_id');
    }
    
    
}
