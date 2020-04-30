<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearImage
 *
 * @property int $id
 * @property string $filename
 * @property string $color
 * @property int $footwear_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FootwearData $footwear
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereFootwearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $model_id
 * @property-read \App\FootwearModel $footwearModel
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearImage whereModelId($value)
 */
class FootwearImage extends Model
{
    protected $table = 'footwear_images';
    protected $primaryKey = 'id';

    protected $fillable = ['model_id', 'filename'];
    protected $hidden = ['created_at', 'updated_at'];

    public function footwearModel() {
        return $this->belongsTo('App\FootwearModel', 'id','model_id');
    }
}
