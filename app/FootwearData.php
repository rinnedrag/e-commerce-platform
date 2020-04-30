<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearData
 *
 * @property int $id
 * @property string $kind
 * @property string $brand
 * @property string $description
 * @property float $price
 * @property string $gender
 * @property string $season
 * @property string $producer_country
 * @property string $fitting
 * @property string $heel_kind
 * @property string $clasp_kind
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereClaspKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereFitting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereHeelKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereProducerCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearData whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearMaterial[] $baseMaterials
 * @property-read int|null $base_materials_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearModelSize[] $colorSizeCount
 * @property-read int|null $color_size_count_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearMaterial[] $materials
 * @property-read int|null $materials_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearModel[] $modelColors
 * @property-read int|null $model_colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearModel[] $models
 * @property-read int|null $models_count
 */
class FootwearData extends Model
{
    protected $table = 'footwear_data';

    protected $hidden = ['id','created_at', 'updated_at'];

    protected $fillable = ['kind', 'brand', 'description', 'gender', 'season', 'producer_country',
        'fitting', 'heel_kind', 'clasp_kind'];


    public function models() {
        return $this->hasMany('App\FootwearModel','footwear_id');
    }

    public function materials() {
        return $this->hasMany('App\FootwearMaterial');
    }
}
