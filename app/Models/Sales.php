<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $fillable =
    [
        'product_id',
        'created_at',	
        'updated_at'
    ];
}
