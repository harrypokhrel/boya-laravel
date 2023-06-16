

@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya Tags</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Tags</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>
<div class="container">
    <h1>Edit TAGS</h1>

    <form action="{{ route('tags.update',tag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="tag_name">NAME</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" value="{{$tag->tag_name}}" >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="coupon_used">STATUS</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="active" >
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" >
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                    </div>
                </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="image">IMAGE</label>
                    <input type="file" name="image" id="image" class="form-control-file" value="{{$tag->image}}" accept="image/*">
                </div>
            </div>
        </div>
         <button type="submit" class="btn btn-primary">UPDATE TAGS</button> 
        </form>
    </div>
    </form>
</div>
@endsection
