<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'color';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
