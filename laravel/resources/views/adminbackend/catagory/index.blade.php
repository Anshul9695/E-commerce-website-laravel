@extends('adminbackend.layout.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>S. No</th>
            <th>Category Name</th>
            <th>Parent Category</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catagoryes as $key=>$catagory)
    <tr>
            <td>{{$key+1}}</td>
            <td>{{$catagory->catagory_name}}</td> 
            <td>
            @if($catagory->category_id)
           {{$catagory->parent->catagory_name}}    <!--//getting parent catagory name here.. -->
            @else
               No Parent catagory
            @endif
            </td>
            <td>{{$catagory->created_at}}</td>

            <td>
                <a href="{{route('catagory.edit',$catagory->id)}}" style="font-size: 25px; padding:5px;"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0);"  style="font-size: 25px; padding:5px;"  data-id="{{$catagory->id}}" class="catagory_delete"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


<!-- USING AJEX TO DELETE THE DATA FROM CATAGORY  -->
@push('footer-script')
<script>
$('.catagory_delete').on('click',function(){
    if(confirm('Are You sure want to delete the category')){
var id=$(this).data('id');
$.ajax({
url:'{{route("catagory.delete")}}',
method:'post',
data:{
    _token:"{{ csrf_token() }}",
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