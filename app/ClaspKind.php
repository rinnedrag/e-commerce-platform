<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaspKind extends Model
{
    protected $table = 'clasp_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
