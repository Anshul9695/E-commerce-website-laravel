<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $catagoryes= Catagory::where('status','1')->get();
       return view('adminbackend.catagory.index',compact('catagoryes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagoryes=Catagory::whereNull('category_id')->get();
        return view('adminbackend.catagory.add',compact('catagoryes'));
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
            'catagory_name'=>$request->catagory_name,
            'category_id'=>$request->category_id
        );
      
      Catagory::create($data);
      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Catagory $catagory)
    {
        $id=$request->id;
        $catagoryes=Catagory::whereNull('category_id')->get();
        $catagory=Catagory::find($id);
      return view('adminbackend.catagory.edit',compact('catagoryes','catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $id=$request->id;
        $data=array(
            'catagory_name'=>$request->catagory_name,
            'category_id'=>$request->category_id
        );
      $catagory=Catagory::find($id);
    $catagory->update($data);
return redirect()->route('catagory.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Catagory $catagory)
    {
        $id=$request->id;
        $catagory=Catagory::find($id);
        $catagory->delete();
        return response()->json('success');

    }

  
}
