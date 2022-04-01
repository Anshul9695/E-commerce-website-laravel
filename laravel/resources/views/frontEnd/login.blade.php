@extends('frontEnd.layouts.layouts')
@section('content')

<div class="span9">
<ul class="breadcrumb">
	<li><a href="{{route('/')}}" >Home</a> <span class="divider">/</span></li>
	<li class="active">Login</li>
</ul>
<h3>Login</h3>
<div class="well">
@if($errors->any)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
    <li>{{$error}}</li>
    </div>
    @endforeach
             
              @endif

	<form class="form-horizontal" action="{{route('loginCheck')}}" method="post">
 @csrf
	<div class="control-group">
    <label for="email" class="control-label">Email address: <sup>*</sup> </label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div class="control-group">
    <label for="email" class="control-label">Password <sup>*</sup> </label>
    <input type="password" name="password" class="form-control" id="email">
  </div>
  <div class="control-group">
    <input type="submit" class="btn btn-success" value="Login">
  </div>
	</form>
</div>
</div>




<div class="span9">

<h3>Registration</h3>
<div class="well">
	<form class="form-horizontal" action="{{route('user_store')}}" method="post">
@csrf
	<div class="control-group">
    <label for="email" class="control-label">First Name <sup>*</sup> </label>
    <input type="text" name="first_name" class="form-control" id="email">
  </div>

  <div class="control-group">
    <label for="email" class="control-label">Last Name <sup>*</sup> </label>
    <input type="text" name="last_name" class="form-control" id="email">
  </div>
	<div class="control-group">
    <label for="email" class="control-label">Email address: <sup>*</sup> </label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div class="control-group">
    <label for="email" class="control-label">Phone <sup>*</sup> </label>
    <input type="text" name="phone" class="form-control" id="email">
  </div>

  <div class="control-group">
    <label for="email" class="control-label">Password <sup>*</sup> </label>
    <input type="password" name="password" class="form-control" id="email">
  </div>
  <div class="control-group">
    <input type="submit" class="btn btn-success" value="Register">
  </div>
	</form>
</div>
</div>

@endsection