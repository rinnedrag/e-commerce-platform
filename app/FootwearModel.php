<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearModel
 *
 * @property int $id
 * @property string $color
 * @property int $footwear_id
 * @property float $rating
 * @property float $price
 * @property int $purchases_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FootwearData $footwear
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereFootwearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel wherePurchasesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearModel whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearModelSize[] $sizes
 * @property-read int|null $sizes_count
 */
class FootwearModel extends Model
{
    protected $table = 'footwear_models';

    protected $fillable = ['footwear_id', 'color', 'price', 'rating', 'purchases_count'];

    public function footwear() {
        return $this->belongsTo('App\FootwearData', 'id','footwear_id');
    }

    public function sizes() {
        return $this->hasMany('App\FootwearModelSize', 'model_id');
    }

    public function images() {
        return $this->hasMany('App\FootwearImage', 'model_id');
    }
}
