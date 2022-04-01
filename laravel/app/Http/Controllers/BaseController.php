<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{
    public function Home(){
        $products=Product::get();
        $new_product=Product::limit(6)->latest()->get();
        $totalproduct=Product::get()->count();
    
        return view('frontEnd.home',compact('products','new_product','totalproduct'));
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
    public function ProductDetails(Request $request){
        $id=$request->id;
        $products=Product::where('id',$id)->with('productDetails')->first();
        $category_id=$products->category_id;
        $releted_products=Product::where('category_id',$category_id)->get();
        // dd($releted_products);
        // die;
        // //  dd($products);
        //  die;
        return view('frontEnd.layouts.productdetails',compact('products','releted_products'));
    }

    public function userlogin(){
        return view('frontEnd.login');
    }

    public function loginCheck(Request $request){
       $data=array(
           'email'=>$request->email,
           'password'=>$request->password
       );
       $auth=Auth::attempt($data);
      if($auth){
          return redirect()->route('/');
      }else{
          return back()->withErrors(['message'=>'login email or password is invalid']);
      }
    }

    public function userStore(Request $request){
       $data=array(
     'name'=>$request->first_name.' '.$request->last_name,
     'email'=>$request->email,
      'phone'=>$request->phone,
      'password'=>Hash::make($request->password),
      'role'=>'user'
       );

     $create=User::create($data);
          return redirect()->route('frontEnd.login');
    }
}
