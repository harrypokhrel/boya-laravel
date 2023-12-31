@extends('layouts.backend')
@section('content')
<section class="content-header">
	<h1>Activities<small>&nbsp;Control Panel</small></h1>
	<a href="{{route('activity.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New</a>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Activities</a></li>
		<li><a href="">List</a></li>
	</ol>
</section>

<section class="content-filter filter__section">
	<form action="{{ route('activity.search') }}" method="POST" role="search">
		{{ csrf_field() }}
		<div class="input-group">
			<input type="text" class="form-control" name="company" placeholder="Search by company" value="<?php echo(isset($_POST['company']))?$_POST['company']:'';?>">
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

	<p id="success_update" style="display:none" class="alert alert-success" align="center"><span class="glyphicon glyphicon-ok">&nbsp;</span>News Updated Successfully</p>
    <p id="error_update" style="display:none" class="alert alert-error" align="center"><span class="glyphicon glyphicon-remove">&nbsp;</span>Error !!!</p>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">List of activities</h3>
				</div>
				<div class="box-body">
					<table id="admin-lte" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Activity Name</th>
								<th>Company</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Age Group</th>
                                <th>Price</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody id="sortable">
						@php($i=1)
                        @foreach($details as $detail)
                        <tr id="{{ $detail->id }}">
                        	<td>{{$i}}</td>
				            <td>{{$detail->title}}</td>
							<td>{{$detail->company->title}}</td>
				            <td>{{$detail->category->category_name}}</td>
                            <td>{{$detail->duration}} Minutes</td>
                            <td>{{$detail->age_group}}</td>
                            <td>{{$detail->price_weekday}} AED</td>
				            <td>
			            	<i><nobr>
				            	<a class="btn btn-md btn-primary edit" href="{{route('activity.edit',$detail->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
				            	<a class="btn btn-danger btn-md btn-delete delete_popup" data-id="{{$detail->id}}" title="Delete"><i class="fa fa-trash"></i></a>
							</nobr>
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

$('body').on('click', '.delete_popup', function () {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire(
			'Deleted!',
			'Your data has been deleted.',
			'success'
			)

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				}
			});

			var formData = {
				postKoId: $(this).data("id"),
			};
			var postID = $(this).data("id");
			var type = "DELETE";
			var ajaxurl = "{{ route('activity.destroy', ":id") }}";
        	ajaxurl = ajaxurl.replace(':id', postID);

			$.ajax({
				type: type,
				url: ajaxurl,
				data: formData,
				dataType: 'json',
				success: function (data) {
					if (data.success == true) {
						$('tr#' + postID ).remove();
					}
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});
});
</script>
@endpush
