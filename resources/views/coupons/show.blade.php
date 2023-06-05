@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Coupon Details</h1>
        
        <!-- Display coupon details -->
        <table class="table">
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>{{ $coupon->id }}</td>
                </tr>
                <tr>
                    <th>Coupon Code</th>
                    <td>{{ $coupon->coupon_code }}</td>
                </tr>
                <tr>
                    <th>Coupon Type</th>
                    <td>{{ $coupon->coupon_type }}</td>
                </tr>
                <tr>
                    <th>Activity</th>
                    <td>{{ $coupon->activity }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $coupon->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $coupon->end_date }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection
