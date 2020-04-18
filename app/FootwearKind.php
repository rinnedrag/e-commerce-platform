<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FootwearKind extends Model
{
    protected $table = 'footwear_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
