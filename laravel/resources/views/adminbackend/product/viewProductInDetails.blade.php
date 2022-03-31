@extends('adminbackend.layout.layout')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Product_id</th>
            <th>Product Name</th>
            <th>product Category</th>
            <th>Product price</th>
            <th>Product image</th>
            <th>Product Title</th>
            <th>Total Items </th>
            <th>Description </th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
@foreach( $products as $key=>$product)

    <tr>
    <td>{{$product->id}}</td>
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
            <td>{{@$product->productDetails->title}}</td> 
            <td>{{@$product->productDetails->total_items}}</td> 
            <td>{{@$product->productDetails->description}}</td> 
            <td>{{$product->created_at}}</td> 

            <td>
            <a href="{{route('product.edit',$product->id)}}" style="font-size: 25px; padding:5px;"><i class="fa fa-edit"></i></a>
            <a href="javascript:void(0);"  style="font-size: 25px; padding:5px;"  data-id="{{$product->id}}" class="delete"><i class="fa fa-trash"></i></a> 
        </td>
        </tr>
  @endforeach
    </tbody>
</table>
@endsection

<!-- USING AJEX TO DELETE THE DATA FROM CATAGORY  -->
@push('footer-script')
<script>
$('.delete').on('click',function(){
    if(confirm('Are You sure want to delete the category')){
      var id=$(this).data('id');
$.ajax({
url:'{{route("product.delete")}}',
method:'post',
data:{
    _token:"{{csrf_token()}}",
    'id':id
},
success:function(data){
     location.reload();
    }
});
       }
    });
</script>
@endpush