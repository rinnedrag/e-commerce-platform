<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'material';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
