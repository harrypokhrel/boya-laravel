@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Coupons</h1>
            <a href="{{ route('coupons.create') }}" class="btn btn-primary">Add New Coupon</a>
        </div>

        <table id="admin-lte" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Coupon Code</th>
                    <th>Coupon Type</th>
                    <th>Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through coupons and display each row -->
                @foreach($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->coupon_type }}</td>
                        <td>{{ $coupon->activity }}</td>
                        <td>{{ $coupon->start_date }}</td>
                        <td>{{ $coupon->end_date }}</td>
                        <td>
                            <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
