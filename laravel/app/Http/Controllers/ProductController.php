<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::get();
        return view('adminbackend.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagoryes=Catagory::whereNotNull('category_id')->get();
        return view('adminbackend.product.add',compact('catagoryes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $data=array(
      'product_name'=>$request->product_name,
      'category_id'=>$request->category_id,
      'product_price'=>$request->product_price,
    );
    if($request->hasFile('image')){
      $image=$request->file('image');
      $filename=date('dmY').time().'.'.$image->getClientOriginalExtension();
      $image->move(public_path('/uploads'),$filename);
      $data['image']=$filename;
    }
    $create=Product::create($data);
return redirect()->route('product.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Product $product)
    {
        $id=$request->id;
       $product=Product::findOrFail($id);
       $catagoryes=Catagory::whereNotNull('category_id')->get();
       return view('adminbackend.product.edit',compact('product','catagoryes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id=$request->id;
       $data=array(
          'product_name'=>$request->product_name,
          'category_id'=>$request->category_id,
          'product_price'=>$request->product_price
       );
       if($request->hasFile('image')){
        $image=$request->file('image');
        $filename=date('dmY').time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads'),$filename);
        $data['image']=$filename;
      }
      $create=Product::where('id',$id)->update($data);
      return redirect()->route('product.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
        $id=$request->id;
        $product=Product::find($id);
        $product->delete();
        return response()->json('success');
    }

    public function extraDetails(Request $request,Product $product){
       $id=$request->id;
    //    $product=Product::findOrFail($id);
       $product=Product::where('id',$id)->with('productDetails')->first();
       $catagoryes=Catagory::whereNotNull('category_id')->get();
 return view('adminbackend.product.extradetails',compact('product','catagoryes','id'));
    }

 public function extraDetailsStore(Request $request)
    {
        $id=$request->id;
     $data=array(
            'title'=>$request->title,
            'product_id'=>$id,
            'total_items'=>$request->total_items,
            'description'=>$request->description
     );
    $create=ProductDetails::updateOrCreate([
        'product_id'=>$id],$data);
        return redirect()->route('product.list');
    }
    
//view in product in  details 


public function viewextraDetails(Request $request,Product $product){
    $id=$request->id;
 //    $product=Product::findOrFail($id);
    $products=Product::where('id',$id)->with('productDetails')->get();

    $catagoryes=Catagory::whereNotNull('category_id')->first();

return view('adminbackend.product.viewProductInDetails',compact('products','catagoryes','id'));
 }

}
