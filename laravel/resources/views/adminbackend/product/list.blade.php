@extends('adminbackend.layout.layout')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>S. No</th>
            <th>Product Name</th>
            <th>product Category</th>
            <th>Product price</th>
            <th>Product image</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@foreach( $products as $key=>$product)

    <tr>
            <td>{{$key+1}}</td>
            <td>{{$product->product_name}}</td> 
            <td>
                @if($product->category_id)
                {{$product->catname->catagory_name}}
            @endif
            </td> 
            <td>{{$product->product_price}}</td> 

            <td>
                <img src="{{asset('uploads/'.$product->image)}}" alt="" style="height: 80px; width:80px">
            </td> 
            <td>{{$product->created_at}}</td> 
        </tr>
  @endforeach
    </tbody>
</table>
@endsection