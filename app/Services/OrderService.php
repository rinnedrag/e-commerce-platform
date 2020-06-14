<?php


namespace App\Services;


use App\FootwearModel;
use App\Http\Controllers\PaymentController;
use App\Order;

class OrderService
{
    public function createOrder($data, $cart, $userID) {
        $postcode = '';
        if (collect($data)->has('postcode')) {
            $postcode = $data['postcode'];
        }
        $order = Order::create([
            'user_id' => $userID,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['number'],
            'comment' => $data['comment'],
            'total' => $data['total'],
            'shipping' => $data['shipping'],
            'shipping_price' => $data['shipping_price'],
            'billing_method' => $data['billing_method'],
            'address' => $data['address'],
            'order_status' => 'принят',
            'postcode' => $postcode,
            'is_paid' => false
        ]);
        $orderProducts = collect([]);
        foreach ($cart as $item) {
            $orderProducts->push([
                'order_id' => $order->id,
                'product_id' => $item['model'],
                'count' => $item['quantity'],
                'size'=> $item['size'],
                'price' => FootwearModel::where('id', $item['model'])->select('price')->first()->price
            ]);
        }
        $order->products()->createMany($orderProducts);

        return $order;
    }

    public function getStatus($orderStatus) {
        if ($orderStatus == 'active') {
            return ['принят', 'обрабатывается', 'у курьера', 'ожидает в точке самовывоза', 'отправлен в точку самовывоза', 'отправлен по почте'];
        } else {
            return ['доставлен клиенту'];
        }
    }
}
