<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearKind
 *
 * @property string $kind
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearKind newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearKind newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearKind query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearKind whereKind($value)
 * @mixin \Eloquent
 */
class FootwearKind extends Model
{
    protected $table = 'footwear_kinds';
    protected $primaryKey = 'kind';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
