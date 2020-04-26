<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ClaspKind
 *
 * @property string $kind
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClaspKind newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClaspKind newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClaspKind query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClaspKind whereKind($value)
 * @mixin \Eloquent
 */
class ClaspKind extends Model
{
    protected $table = 'clasp_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
