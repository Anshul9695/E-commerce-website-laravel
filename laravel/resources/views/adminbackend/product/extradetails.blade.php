@extends('adminbackend.layout.layout')

@section('content')
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('product.extraDetailsStore',$id)}}" method="post" enctype="multipart/form-data">
       <div class="x_title">
           @csrf
                    <h2>Add Product Extra Details <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                          <img style="height: 80px; width:200px;  display: block; margin: 0 auto;" name="image" src="{{asset('uploads/'.$product->image)}}"  />
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="product_name" value="{{$product->product_name}}" disabled required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Product Catogory <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" class="form-control col-md-7 col-xs-12" disabled name="category_id">
                          <option value="">No sub catogery</option>
                              @foreach($catagoryes as $catagory)
                              <option value="{{$catagory->id}}" @if($product->category_id==$catagory->id) selected @endif>{{$catagory->catagory_name}} </option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" name="product_price" value="{{$product->product_price}}" disabled required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
<hr/>
                      <!-- Add Extra Details from here  -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="title" value="{{@$product->productDetails->title}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Items <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name"  name="total_items" value="{{@$product->productDetails->total_items}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="first-name" name="description" required="required" class="form-control col-md-7 col-xs-12" rows="5">{{@$product->productDetails->description}}</textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                          <input type="submit" value="Add-ExtraDetails" name="submit" class="btn btn-success">
                        </div>
                      </div>

                    </form>
@endsection