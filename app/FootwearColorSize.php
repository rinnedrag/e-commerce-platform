<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootwearColorSize
 *
 * @property int $footwear_id
 * @property string $color
 * @property int $size
 * @property int $count
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Footwear $footwear
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereFootwearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootwearColorSize whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FootwearColorSize extends Model
{
    protected $table = 'footwear_color_size';
    protected $primaryKey = ['footwear_id', 'color', 'size'];
    public $incrementing = false;

    protected $fillable = ['footwear_id', 'color', 'size', 'count'];

    public function footwear() {
        return $this->belongsTo('App\Footwear', 'id','footwear_id');
    }
}
