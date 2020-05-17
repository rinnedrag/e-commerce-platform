<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $town
 * @property string $street
 * @property string $building
 * @property string $flat
 * @property int $postcode
 * @property string $shipping
 * @property string $order_status
 * @property float $total
 * @property string $billing_method
 * @property bool $is_billed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $comment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderProduct[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBillingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereFlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereIsBilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $table = 'orders';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['user_id', 'phone_number', 'first_name', 'last_name', 'email', 'address', 'postcode', 'shipping',
        'shipping_price', 'billing_method', 'total', 'comment', 'is_paid', 'order_status', 'comment'];

    public function products() {
        return $this->hasMany('App\OrderProduct','order_id');
    }

}
