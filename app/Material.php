<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Material
 *
 * @property string $material
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Material newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Material newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Material query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Material whereMaterial($value)
 * @mixin \Eloquent
 */
class Material extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'material';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
