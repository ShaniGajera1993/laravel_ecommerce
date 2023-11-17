<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){

        $product = DB::table("products")->limit(6)->get();

        return view("index",["products"=>$product]);

    }

    public function product(){

        $product = DB::table("products")->paginate(9);

        return view("products",["products"=>$product]);
        
    }

    public function productdetails($id)
    {

        $product = DB::table("products")->where('id', $id)->first();

        $similarProducts = DB::table('products')->limit(3)->get();

        if ($product) {
            return view("product-details", ["products" => $product], ["similarProducts"=> $similarProducts]);
        } else {
            abort(404);
        }
    }
}
