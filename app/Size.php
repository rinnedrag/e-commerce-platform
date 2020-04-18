<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $primaryKey = 'size';
    public $incrementing = false;
    protected $keyType = 'number';
    public $timestamps = false;
}
