<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamp = false;
    protected $table = 'companies';
    protected $fillable =
    [
        'company_name',
        'street_address',
        'representative_name',
        'created_at',	
        'updated_at'
    ];

    public function Product()
    {
     return $this->hasMany('App\Models\Product');
    }
}
