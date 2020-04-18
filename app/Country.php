<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'country';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
