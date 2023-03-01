<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public $timestamp = false;
    protected $table = 'sales';
    protected $fillable =
    [
        'product_id',
        'created_at',	
        'updated_at'
    ];

    public function Product()
    {
     return $this->belongsTo('App\Models\Product');
    }
}
