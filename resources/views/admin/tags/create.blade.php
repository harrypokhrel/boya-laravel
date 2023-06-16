@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya Tags</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Tags</a></li>
		<li><a href="">Add</a></li>
	</ol>
</section>
<div class="container">
    <h1>ADD NEW TAG</h1>

    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="tag_name">NAME</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="coupon_used">STATUS</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="active" required>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" required>
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                    </div>
                </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="image">IMAGE</label>
                    <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">ADD TAGS</button> 
        </form>
    </div>
    </form>
</div>

@endsection
