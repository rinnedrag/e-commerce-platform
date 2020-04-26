<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearMaterial
 *
 * @property int $footwear_id
 * @property string $material
 * @property float $percent
 * @property-read \App\Footwear $footwear
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial whereFootwearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearMaterial wherePercent($value)
 * @mixin \Eloquent
 */
class FootwearMaterial extends Model
{
    protected $table = 'footwear_materials';
    protected $primaryKey = ['footwear_id', 'material', 'component'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['footwear_id', 'material', 'component', 'percent'];

    public function footwear() {
        return $this->belongsTo('App\Footwear', 'id','footwear_id');
    }
}
