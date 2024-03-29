<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {

        if ($request->session()->has('cart')) {

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $city = $request->input('city');
            $address = $request->input('address');
            $date = date('Y-m-d');
            $status = "not paid";
            $cost = $request->session()->get('total');

            $cart = $request->session()->get('cart');

            $orders_id = DB::table('orders')->insertGetId([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'address' => $address,
                'cost' => $cost,
                'status' => $status,
                'date' => $date,
            ], 'id');

            foreach ($cart as $id => $product) {
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

            $request->session()->put('order_id', $orders_id);

            return redirect('/payment');
        } else {
            return redirect('/');
        }

    }

    public function payment()
    {
        return view('payment');
    }


    public function verifyPayment(Request $request, $transaction_id)
    {
        $request->session()->put('transaction_id', $transaction_id);

        return redirect('/complete_payment');
    }
    public function completePayment(Request $request)
    {

        $data = [
            'to' => 'dealbuddy1353@gmail.com',
            'email' => '',
            'transaction_id' => '',
            'total_price' => 0,
            'products' => [],
        ];

        if ($request->session()->has('order_id') && $request->session()->has('transaction_id')) {

            $order_id = $request->session()->get('order_id');
            $transaction_id = $request->session()->get('transaction_id');
            $order_status = "paid";
            $payment_date = date('Y-m-d');

            $email = $request->session()->get('email');
            $cost = $request->session()->get('total');
            $cart = $request->session()->get('cart');

            $changesDB = DB::table('orders')
                ->where('id', $order_id)
                ->update(['status' => $order_status]);

            DB::table('payments')->insert([
                'order_id' => $order_id,
                'transaction_id' => $transaction_id,
                'date' => $payment_date
            ]);

            $data['email'] = $email;
            $data['transaction_id'] = $transaction_id;
            $data['total_price'] = $cost;

            print_r($data);

            foreach ($cart as $id => $product) {
                $product = $cart[$id];
                $product_name = $product['name'];
                $product_price = $product['price'];
                $product_image = $product['image'];
                $product_quantity = $product['quantity'];

                $data['products'][] = [
                    'name' => $product_name,
                    'price' => $product_price,
                    'image' => $product_image,
                    'quantity' => $product_quantity
                ];
                var_dump($product_name, $product_price);
            }

            $subject = "Your order is confirmed";

            Mail::send('paymentemail', ['data' => $data], function ($message) use ($data, $subject) {
                $message->to($data['email'])
                    ->from($data['to'])
                    ->subject($subject);
            });

            $request->session()->forget('cart');

            return redirect('/thank-you')->with('order_id', $order_id);

        } else {

            return redirect('/');

        }

    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
