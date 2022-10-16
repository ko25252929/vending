<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =
    [
        'company_id',
        'product_name',
        'price'	,
        'stock'	,
        'comment',	
        'img_path'
    ];
}
