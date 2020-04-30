<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearModelSize
 *
 * @property int $footwear_id
 * @property string $color
 * @property int $size
 * @property int $count
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\FootwearData $footwear
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereFootwearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $model_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModelSize whereModelId($value)
 */
class FootwearModelSize extends Model
{
    protected $table = 'footwear_model_sizes';
    protected $primaryKey = ['model_id', 'size'];
    public $incrementing = false;

    protected $fillable = ['model_id', 'size', 'count'];

    public function footwear() {
        return $this->belongsTo('App\FootwearModel', 'id','model_id');
    }
}
