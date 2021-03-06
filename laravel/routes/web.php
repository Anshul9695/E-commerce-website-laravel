<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


               //FROENT END TEMPLATE ROUTES 
Route::get('/',[BaseController::class,'Home'])->name('/');
Route::get('/spacialoffers',[BaseController::class,'SpacialOffers'])->name('spacialoffers');
Route::get('/delevery',[BaseController::class,'Delevery'])->name('delevery');
Route::get('/contact',[BaseController::class,'Contact'])->name('contact');
Route::get('/cart',[BaseController::class,'Cart'])->name('cart');
Route::get('/productdetails/{id}',[BaseController::class,'ProductDetails'])->name('productdetails');  //view product in details over all info about product

Route::get('/user/login',[BaseController::class,'userlogin'])->name('frontEnd.login');
Route::post('/user/login',[BaseController::class,'loginCheck'])->name('loginCheck');
Route::post('/user/Register',[BaseController::class,'userStore'])->name('user_store');


                 // BACKEND TEMPLATE ROUTES
        Route::get('/admin/login',[AdminController::class,'loginuser'])->name('adminbackend.login');
        Route::post('/admin/login',[AdminController::class,'adminlogin'])->name('adminbackend.makelogin');

//MAKING MIDDLE WARE FOR LOGIN AND LOG OUT PROCESS 

//  Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard',[AdminController::class,'admindashboard'])->name('adminbackend.dashboard');
    Route::get('/admin/logout',[AdminController::class,'logoutuser'])->name('adminbackend.logout');

//CATAGORY ROUTE FOR DISPLAY ALL TYPES OF CATAGORY
Route::get('/catagory/add',[CatagoryController::class,'create'])->name('catagory.add');
Route::post('/catagory/add',[CatagoryController::class,'store'])->name('catagory.store');
Route::get('/catagoryes',[CatagoryController::class,'index'])->name('catagory.list');
    //edit and update catagory
Route::get('/catagoryes/edit/{id}',[CatagoryController::class,'edit'])->name('catagory.edit');
Route::post('/catagoryes/edit/{id}',[CatagoryController::class,'update'])->name('catagory.update');
Route::post('/catagoryes/delete',[CatagoryController::class,'destroy'])->name('catagory.delete');  //delete the catagory

//Making product manager here...
Route::get('/product',[ProductController::class,'index'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/create',[ProductController::class,'store'])->name('product.store');

Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit'); //this is the form to get all data from table 
Route::post('/product/edit/{id}',[ProductController::class,'update'])->name('product.update');  //this route with update funciton  is maked for update record 

Route::post('/product/delete',[ProductController::class,'destroy'])->name('product.delete'); //delete the product
Route::get('/porduct/extradetails/{id}',[ProductController::class,'extraDetails'])->name('product.extraDetails');

Route::post('/porduct/extradetails/{id}',[ProductController::class,'extraDetailsStore'])->name('product.extraDetailsStore');


Route::get('/product/viewiporductndetails/{id}',[ProductController::class,'viewextraDetails'])->name('product.viewindetails'); 
//  });



