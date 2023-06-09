@extends('layouts.backend')

@section('styles')
<style>
	button.btn.btn-default {
		margin-top: 25px;
	}
</style>
@endsection

@section('content')
<section class="content-header">
	<h1>Users<small>&nbsp;Control Panel</small></h1>
	<a href="{{route('users.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Users</a></li>
		<li><a href="">List</a></li>
	</ol>
</section>

<section class="content-filter filter__section">
	<form action="{{ route('users.search') }}" method="POST" role="search">
		{{ csrf_field() }}
		<div class="input-group">

			<div class="form-group" data-select2-id="13">
				<label>Filter by role</label>
				<select name="roles" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
					<option selected="selected" data-select2-id="">-- Select a role --</option>
					<option data-select2-id="Admin">Admin</option>
					<option data-select2-id="Activity Owner">Activity Owner</option>
					<option data-select2-id="Customer">Customer</option>
				</select>
			</div>
			
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
	</form>
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

	<p id="success_update" style="display:none" class="alert alert-success" align="center"><span class="glyphicon glyphicon-ok">&nbsp;</span>User Added Successfully</p>
    <p id="error_update" style="display:none" class="alert alert-error" align="center"><span class="glyphicon glyphicon-remove">&nbsp;</span>Error !!!</p>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">List of users</h3>
				</div>
				<div class="box-body">
					<table id="admin-lte" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Role</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody id="sortable">
						@php($i=1)
                        @foreach($details as $detail)
                        <tr id="{{ $detail->id }}">
                        	<td>{{$i}}</td>
				            <td>{{$detail->name}}</td>
				            <td>{{$detail->email}}</td>
                            <td>{{ $detail->roles->pluck('name')->first() }}</td>
				            <td>
			            	<i><nobr>
				            	<a class="btn btn-md btn-primary edit" href="{{route('users.edit',$detail->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
				            	<form method= "post" action="{{route('users.destroy',$detail->id)}}" class="delete" style="display: inline-block;">
                				{{csrf_field()}}
                				<input type="hidden" name="_method" value="DELETE">
               					<button type="submit" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger btn-md btn-delete" title="Delete"><i class="fa fa-trash"></i></button>
               				    </form></nobr>
               				</i>
				            </td>
                        </tr>
                        @php($i++)
                        @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function(){
	$("#admin-lte").DataTable();
});
</script>
@endpush
