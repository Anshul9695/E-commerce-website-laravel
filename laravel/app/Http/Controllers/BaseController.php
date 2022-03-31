<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function Home(){
        $products=Product::get();
        $new_product=Product::limit(4)->latest()->get();
        return view('frontEnd.home',compact('products','new_product'));
    }
    public function SpacialOffers(){
        return view('frontEnd.layouts.spacialOffers');
    }
    public function Delevery(){
        return view('frontEnd.layouts.Delevery');
    }
    public function Contact(){
        return view('frontEnd.layouts.contact');
    }

    public function Cart(){
        return view('frontEnd.layouts.cart');
    }
    public function ProductDetails(){
        return view('frontEnd.layouts.productdetails');
    }
}
