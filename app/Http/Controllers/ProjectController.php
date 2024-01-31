<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

        $product = DB::table("products")->limit(6)->get();

        return view("index", ["products" => $product]);

    }

    public function product()
    {

        $product = DB::table("products")->paginate(9);

        return view("products", ["products" => $product]);

    }

    public function productdetails($id)
    {

        $product = DB::table("products")->where('id', $id)->first();

        $similarProducts = DB::table('products')->limit(3)->get();

        if ($product) {
            return view("product-details", ["products" => $product], ["similarProducts" => $similarProducts]);
        } else {
            abort(404);
        }
    }

    public function newest()
    {

        $products = DB::table("products")->orderBy('id', 'desc')->paginate(9);

        return view("products", ["products" => $products]);
    }

    public function lowest()
    {

        $products = DB::table("products")->orderBy('price', 'asc')->paginate(9);

        return view('products', ["products" => $products]);
    }

    public function highest()
    {

        $products = DB::table("products")->orderBy('price', 'desc')->paginate(9);

        return view('products', ["products" => $products]);
    }

    public function men()
    {

        $products = DB::table("products")->where('type', 'Men')->paginate(9);

        return view('products', ["products" => $products]);
    }

    public function women()
    {

        $products = DB::table("products")->where('type', 'Women')->paginate(9);

        return view('products', ["products" => $products]);
    }

    public function getOrderHistory()
    {
        $userEmail = auth()->user()->email;

        $orderHistorys = DB::table('orders')->where('email', $userEmail)->get();

        $orderDetails = [];

        foreach ($orderHistorys as $orderHistory) {
            $order_id = $orderHistory->id;

            $productDetails = DB::table('order_items')->where('order_id', $order_id)->get();
            $paymentDetails = DB::table('payments')->where('order_id', $order_id)->get();

            $orderDetails[] = [
                'order' => $orderHistory,
                'products' => $productDetails,
                'payment' => $paymentDetails,
            ];
        }

        return view('myorder', ["orderDetails" => $orderDetails]);
    }

}
