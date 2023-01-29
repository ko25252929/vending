<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = 'companies';

    protected $fillable =
    [
        'company_name',
        'street_address',
        'representative_name',
        'created_at',	
        'updated_at'
    ];
}
