<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request){

        if($request->session()->has('cart')){

            $name = $request -> input('name');
            $email = $request -> input('email');
            $phone = $request -> input('phone');
            $city = $request -> input('city');
            $address = $request -> input('address');
            $date = date('Y-m-d');
            $status = "not paid";
            $cost = $request -> session() -> get('total');
        
            $cart = $request->session()->get('cart');

            $orders_id = DB::table('orders')->insertGetId([
                'name'=>$name,
                'email'=>$email,
                'phone'=>$phone,
                'city'=>$city,
                'address'=>$address,
                'cost'=>$cost,
                'status'=>$status,
                'date'=>$date,
            ], 'id');

            foreach($cart as $id => $product){
                $product = $cart[$id];
                $product_id = $product['id'];
                $product_name = $product['name'];
                $product_price = $product['price'];
                $product_image = $product['image'];
                $product_quantity = $product['quantity'];

                DB::table('order_items')->insert([
                    'order_id' => $orders_id,
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_image' => $product_image,
                    'product_quantity' => $product_quantity,
                    'order_date' => $date,
                ]);
            }

            //store order id in session

            $request -> session() -> put('order_id',$orders_id);

            return redirect('/payment');
        } else {
            return redirect('/');
        }
        
    }

    public function payment(){
        return view('payment');
    }
}
