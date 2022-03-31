<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function Home(){
        return view('frontEnd.home');
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
