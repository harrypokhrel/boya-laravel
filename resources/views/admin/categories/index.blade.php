@extends('layouts.backend')

@section('content')
    <section class="content-header">
        <h1>Boya Categories</h1>
        <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Categories</a></li>
            <li><a href="">List</a></li>
        </ol>
    </section>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">CATEGORIES</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <table id="admin-lte" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>PARENT CAT ID</th>
                    <th>IMAGE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categories)
                    <tr>
                        <td>{{ $categories->category_name }}</td>
                        <td>{{ $categories->parent_cat_id }}</td>
                        <td>{{ $categories->image }}</td>
                        <td>{{ $categories->status }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
