@extends('layouts.backend')
@section('content')
<section class="content-header">
	<h1>Company<small>&nbsp;Control Panel</small></h1>
	<a href="{{route('company.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Company</a></li>
		<li><a href="">List</a></li>
	</ol>
</section>

<section class="content-filter filter__section">
	<form action="{{ route('company.search') }}" method="POST" role="search">
		{{ csrf_field() }}
		<div class="input-group">
			<input type="text" class="form-control" name="user" placeholder="Search by owner name" value="<?php echo(isset($_POST['user']))?$_POST['user']:'';?>">
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
					<h3 class="box-title">List of companies</h3>
				</div>
				<div class="box-body">
					<table id="admin-lte" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Email Address</th>
                                <th>Owner Name</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody id="sortable">
						@php($i=1)
                        @foreach($details as $detail)
                        <tr id="{{ $detail->id }}">
                        	<td>{{$i}}</td>
				            <td>{{$detail->title}}</td>
				            <td>{{$detail->email}}</td>
                            <td>{{$detail->user->name}}</td>
				            <td>
			            	<i><nobr>
				            	<a class="btn btn-md btn-primary edit" href="{{route('company.edit',$detail->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
				            	<form method= "post" action="{{route('company.destroy',$detail->id)}}" class="delete" style="display: inline-block;">
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
