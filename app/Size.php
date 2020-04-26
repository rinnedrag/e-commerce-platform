<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Size
 *
 * @property int $size
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Size whereSize($value)
 * @mixin \Eloquent
 */
class Size extends Model
{
    protected $table = 'sizes';
    protected $primaryKey = 'size';
    public $incrementing = false;
    protected $keyType = 'number';
    public $timestamps = false;
}
