<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Footwear
 *
 * @property int $id
 * @property string $kind
 * @property string $brand
 * @property string $photos
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereClaspKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereFitting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereHeelKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereProducerCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Footwear whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearMaterial[] $baseMaterials
 * @property-read int|null $base_materials_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootwearColorSize[] $colorSizeCount
 * @property-read int|null $color_size_count_count
 */
class Footwear extends Model
{
    protected $table = 'footwear';

    protected $fillable = ['kind', 'brand', 'description', 'photos', 'price', 'gender', 'season', 'producer_country',
        'fitting', 'heel_kind', 'clasp_kind'];

    public function colorSizeCount() {
        return $this->hasMany('App\FootwearColorSize');
    }

    public function materials() {
        return $this->hasMany('App\FootwearMaterial');
    }

}
