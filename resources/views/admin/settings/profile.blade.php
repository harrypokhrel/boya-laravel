@extends('layouts.backend')
@section('content')
<section class="content-header">
	<h1>Boya Users</h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Users</a></li>
		<li><a href="">Add</a></li>
	</ol>
</section>
<div class="content">
    @if(Session::has('message'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
    	</button>
    	{!! Session::get('message') !!}
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('settings.profileUpdate', Auth::id())}}" enctype="multipart/form-data">
    {{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Update user details</h3>
				</div>
				<div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="user_role">Your role</label>
                            <select id="user_role" name="user_role" class="w-100">
                                <?php foreach ($roles as $row){
                                    if($detail->roles->pluck('name')->first() == $row->name){ ?>
                                        <option value="{{ $row->name }}">{{ $row->name}}</option>
                                <?php } } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{$detail->name}}" class="w-100">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="{{$detail->email}}" class="w-100">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="{{$detail->phone}}" class="w-100">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="w-100">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form__wrap">
                                <label for="password">Confirm Password</label>
                                <input type="password" id="password" name="password_confirmation" class="w-100">
                            </div>
                        </div>

                        <input type="hidden" id="updated_at" name="updated_at" value="<?php echo date('Y-m-d H:i:s');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="UPDATE USER" name="update_user" class="btn btn__primary mx-auto">
                        </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection