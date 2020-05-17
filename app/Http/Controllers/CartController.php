<?php

namespace App\Http\Controllers;

use App\FootwearImage;
use App\FootwearModel;
use App\Services\FootwearService;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        $cart = session()->get('cart');
        if (!$cart) {
            return (view('home.cart'));
        }

        $footwear = (new FootwearService())->getFootwearCart($cart)->groupBy('id');

        $totalPrice = 0;

        foreach ($cart as $item) {
           $totalPrice += $item['quantity']*$footwear[$item['model']][0]->price;
        }

        return view('home.cart')
            ->with('footwearData', $footwear)
            ->with('totalPrice', $totalPrice);
    }

    public function addTo(Request $request, $id) {
        if (!FootwearModel::whereId($id)->get()) {
            return view('layouts.404');
        }

        $cart = session()->get('cart');
        $data = $request->all();

        //cart is empty
        if (!$cart) {
            $cart = [
                $id.'-'.$data['size'] => [
                    'size' => $data['size'],
                    'brand' => $data['brand'],
                    'kind' => $data['kind'],
                    'model' => $id,
                    'quantity' => $data['quantity']
                ]
            ];
            session()->put('cart', $cart);
            return response()->json('The product has been added successfully', 201);
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id.'-'.$data['size']])) {
            $cart[$id.'-'.$data['size']]['quantity']++;
            session()->put('cart', $cart);
            return response()->json('The product has been updated successfully', 201);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id.'-'.$data['size']] = [
            'size' => $data['size'],
            'brand' => $data['brand'],
            'kind' => $data['kind'],
            'model' => $id,
            'quantity' => 1
        ];

        session()->put('cart', $cart);
        return response()->json('The product has been added successfully', 201);
    }

    public function update (Request $request, $id) {
        $data = $request->all();
        if($id and $data['quantity'])
        {
            $cart = session()->get('cart');
            $cart[$id.'-'.$data['size']]['quantity'] = $data['quantity'];
            session()->put('cart', $cart);
            //session()->flash('success', 'Cart updated successfully');
        }
        return response()->json('Quantity of the product has been successfully updated', 201);
    }

    public function deleteFrom (Request $request, $id) {
        $size = $request->input('size');
        if ($id && $size) {
            $cart = session()->get('cart');
            if(isset($cart[$id.'-'.$size])) {
                unset($cart[$id.'-'.$size]);
                session()->put('cart', $cart);

                return response()->json('The product had been successfully removed', 200);
            }

            return response()->json('There isn\'t such product in the cart', 404);
        }
        return response()->json('No required parameters was defined', 400);
    }
}
