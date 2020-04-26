<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property string $country
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCountry($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'country';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
