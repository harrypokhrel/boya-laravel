@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Edit Coupon</h1>
        
        <!-- Edit coupon form -->
        <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Add coupon form fields here -->
            <div class="form-group">
                <label for="coupon_code">Coupon Code</label>
                <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{ $coupon->coupon_code }}" required>
            </div>

            <div class="form-group">
                <label for="coupon_type">Coupon Type</label>
                <input type="text" name="coupon_type" id="coupon_type" class="form-control" value="{{ $coupon->coupon_type }}" required>
            </div>

            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" name="activity" id="activity" class="form-control" value="{{ $coupon->activity }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $coupon->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $coupon->end_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
