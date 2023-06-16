<!-- edit.blade.php -->

@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya categories</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Categories</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>
<div class="container">
    <h1>Edit Categories</h1>

    <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="category_name">NAME</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">STATUS</label><br>
                        <div class="form-check form-check-inline" value="{{ $category->status }}" >
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
                        <input type="file" name="image" id="image" class="form-control-file" value="{{ $category->image }}" accept="image/*">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">UPDATE CATEGORIES</button> 
        </form>
    </div>
    </form>
</div>
@endsection
