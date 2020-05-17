<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderProduct
 *
 * @property int $order_id
 * @property int $product_id
 * @property int $count
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\FootwearModel $footwearModels
 * @property-read \App\Order $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = ['order_id', 'product_id', 'size'];
    public $incrementing = false;

    protected $fillable = ['order_id', 'product_id', 'count', 'price', 'size'];

    public function products() {
        return $this->belongsTo('App\Order','id', 'order_id');
    }

    public function footwearModels() {
        return$this->belongsTo('App\FootwearModel', 'id', 'product_id');
    }
}
