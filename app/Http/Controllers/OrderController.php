<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\OrderService;
use Auth;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('role:user');
    }

    public function create(Request $request) {
        $data = $request->all();
        $cart = session()->get('cart');

        $validator = \Validator::make($data, [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'number' => 'required',
            'email' => 'required|email',
            'total' => 'required|numeric',
            'address' => 'required',
            'shipping_price' => 'required|numeric',
            'billing_method' => 'required',
            'comment' => 'max:100',
            'postcode' => 'numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator, '400');
        }

        $order = (new OrderService())->createOrder($data, $cart, Auth::id());

        return response()->json([
            'order' => $order->id
        ], 201);
    }

    public function pay(Request $request, $id) {
        $data = $request->all();
        Order::where('id', $id)->update(['is_paid' => true, 'stripe_payment_id' => $data['stripe_payment_id']]);
        session()->forget('cart');
        return response()->json('order\'s paid', 200);
    }

    public function getOrders(Request $request) {
        $validator = \Validator::make($request->all(), [
            'page' => 'required|numeric',
            'order_status' => [
                'required',
                Rule::in(['active', 'archive']),
            ]
        ]);
        if ($validator->fails()) {
            return view('layouts.404');
        }

        $orders = Order::where('user_id', Auth::id());
        if ($request->has('order_status')) {
            $orders = $orders->whereIn('order_status', (new OrderService())->getStatus($request->input('order_status')));
        }
        return view('home.userOrders')
            ->with('orders', $orders->paginate(4));
    }
}
