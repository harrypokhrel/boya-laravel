@extends('layouts.backend')

@section('content')
    <section class="content-header">
        <h1>Boya Tags</h1>
        <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Tags</a></li>
            <li><a href="">List</a></li>
        </ol>
    </section>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">TAGS</h1>
            <a href="{{ route('tags.create') }}" class="btn btn-primary">Add New Tag</a>
        </div>
        <table id="admin-lte" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag_name }}</td>
                        <td>{{ $tag->image }}</td>
                        <td>{{ $tag->status }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
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
