<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\FootwearService;
use http\Env\Response;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;



function calculateOrderAmount(array $items) {
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // customers from directly manipulating the amount on the client
    $total = Order::where('id',  $items[0]['id'])->select('total')->first();
    return $total['total']*100;
}

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function checkout() {
        $cart = session()->get('cart');
        if (!$cart) {
            return back();
        }

        $footwear = (new FootwearService())->getFootwearDetailsForCheckout($cart)->groupBy('id');
        $productsAmount = 0;
        foreach ($cart as $item) {
            $productsAmount += $item['quantity']*$footwear[$item['model']][0]->price;
        }
        $shippingPrice = 300.00;

        return view('home.checkout')
            ->with('products', $footwear)
            ->with('productsAmount', $productsAmount)
            ->with('shippingPrice', $shippingPrice);
    }

    public function paymentPage(Request $request) {
        $orderID = $request->input('order');
        return view('home.payment')
            ->with('order', Order::where('id', $orderID)->select('id', 'total')->first());
    }

    public function pay(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_PiQoh5Atvx2GsmtUDwgC6emi00PCJwtlee');
        $data = $request->all();

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => calculateOrderAmount($data['items']),
                'currency' => 'rub',
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            return response()->json($output, 200);
        } catch (ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
