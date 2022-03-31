<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

;

class AdminController extends Controller
{
    public function loginuser(){
    //    echo Hash::make('admin@123');
    //    die;

        return view('adminbackend.login');
      
    }

    public function adminlogin(Request $request){

$data=array(
   'email'=>$request->email,
   'password'=>$request->password,
   'role'=>'admin'
);
if(Auth::attempt($data)){
 return redirect()->route('adminbackend.dashboard');

}else{
    return back()->withErrors(['message'=>'invalid user email or password']);
}
    }
  public function admindashboard(){
      return view('adminbackend.dashbord');
  }

public function logoutuser(){
    Auth::logout();
    // dd(session()->all());
    // die;
    return redirect()->route('adminbackend.login');
}

}
