<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FootwearBrand extends Model
{
    protected $table = 'footwear_brands';
    protected $primaryKey = 'brand';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
