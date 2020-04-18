<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitting extends Model
{
    protected $table = 'fitting';
    protected $primaryKey = 'literal';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
