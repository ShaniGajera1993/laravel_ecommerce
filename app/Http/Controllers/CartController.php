<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {

        return view('cart');
    }

    public function add_to_cart(Request $request)
    {

        if ($request->session()->has('cart')) {

            $cart = $request->session()->get('cart');

            $product_array_id = array_column($cart, 'id');
            $id = $request->input('id');

            if (!in_array($id, $product_array_id)) {

                $cart = $request->session()->get('cart');

                $id = $request->input('id');
                $name = $request->input('name');
                $image = $request->input('image');
                $price = $request->input('price');
                $sale_price = $request->input('sale_price');
                $quantity = $request->input('quantity');

                if ($sale_price != null) {
                    $p_price = $sale_price;
                } else {
                    $p_price = $price;
                }
                $product_array = array(
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'price' => $p_price,
                    'quantity' => $quantity
                );

                $cart[$id] = $product_array;
                $request->session()->put('cart', $cart);

            } else {
                echo "<script>alert('Product is already in the cart')</script>";
            }

            $this->cartTotal($request);

            return view('cart');

        } else {

            $cart = $request->session()->get('cart');

            $id = $request->input('id');
            $name = $request->input('name');
            $image = $request->input('image');
            $price = $request->input('price');
            $sale_price = $request->input('sale_price');
            $quantity = $request->input('quantity');

            if ($sale_price != null ) {
                $p_price = $sale_price;
            } else {
                $p_price = $price;
            }
            $product_array = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $p_price,
                'quantity' => $quantity
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart', $cart);

            $this->cartTotal($request);
            
            return view('cart');
        }
    }

    public function cartTotal(Request $request){

        $total_price = 0;
        $total_quantity = 0;
        $cart = $request->session()->get('cart');

        foreach($cart as $id => $product){

            $product = $cart[$id];

            $price = $product['price'];
            $quantity= $product['quantity'];

            $total_price = $total_price + ($price * $quantity);

            $total_quantity = $total_quantity + $quantity;
        }

        $request -> session() -> put('total',$total_price);
        $request -> session() -> put('quantity', $total_quantity);

    }

    public function remove_from_cart(Request $request){

        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');
            $product_id = $request -> input('id');

            unset($cart[$product_id]);

            $request -> session() -> put('cart',$cart);

            $this->cartTotal($request);
        }

        return view('cart');
    }

    public function edit_product_quantity(Request $request){

        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');
            $product_id = $request -> input('id');
            $product_quantity = $request -> input('quantity');

            if(array_key_exists($product_id, $cart)){

                $cart[$product_id]['quantity'] = $product_quantity;
            }

            $request -> session() -> put('cart',$cart);

            $this->cartTotal($request);
        }

        return view('cart');
    }
}
