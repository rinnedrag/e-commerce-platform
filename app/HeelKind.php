<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeelKind extends Model
{
    protected $table = 'heel_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
