<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HeelKind
 *
 * @property string $kind
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HeelKind newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HeelKind newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HeelKind query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HeelKind whereKind($value)
 * @mixin \Eloquent
 */
class HeelKind extends Model
{
    protected $table = 'heel_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
