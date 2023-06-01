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
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Add an user</h3>
				</div>
				<div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="user_role">Assign a role</label>
                            <select id="user_role" name="user_role" class="w-100">
                                <?php foreach ($roles as $row){ ?>
                                    <option value="{{ $row->name }}">{{ $row->name}}</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="10" placeholder="">
                        </div>

                        <div class="col-md-6">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone">
                        </div>

                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>

                        <div class="col-md-6">
                            <label for="password">Confirm Password</label>
                            <input type="password" id="password" name="password_confirmation">
                        </div>

                        <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s');?>">
                        
                        <div class="form__wrap span__2 mt-4">
                            <input type="submit" value="ADD USER" name="add_user" class="btn btn__primary mx-auto">
                        </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection