<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearBrand
 *
 * @property string $brand
 * @property string $country
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearBrand whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearBrand whereCountry($value)
 * @mixin \Eloquent
 */
class FootwearBrand extends Model
{
    protected $table = 'footwear_brands';
    protected $primaryKey = 'brand';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
