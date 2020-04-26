<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fitting
 *
 * @property string $literal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fitting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fitting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fitting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Fitting whereLiteral($value)
 * @mixin \Eloquent
 */
class Fitting extends Model
{
    protected $table = 'fitting';
    protected $primaryKey = 'literal';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
