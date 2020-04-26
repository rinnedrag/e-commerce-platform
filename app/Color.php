<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Color
 *
 * @property string $color
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color whereColor($value)
 * @mixin \Eloquent
 */
class Color extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'color';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
