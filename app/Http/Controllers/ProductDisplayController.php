<?php

namespace App\Http\Controllers;

use App\ProductAdd;

class ProductDisplayController extends Controller
{
        public function index(){

            $products =ProductAdd::all();
            return view('shop', ['products'=>$products]);


    }
}
