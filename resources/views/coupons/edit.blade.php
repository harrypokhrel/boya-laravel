@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya Coupons</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Coupons</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>

    <div class="container">
        <h1>Edit Coupon</h1>
        <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="coupon_code">COUPON CODE</label>
                <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{ $coupon->coupon_code }}" required>
            </div>

            <div class="form-group">
                <label for="coupon_type">COUPON TYPE</label>
                <input type="text" name="coupon_type" id="coupon_type" class="form-control" value="{{ $coupon->coupon_type }}" required>
            </div>

            <div class="form-group">
                <label for="activity">ACTIVITY</label>
                <input type="text" name="activity" id="activity" class="form-control" value="{{ $coupon->activity }}" >
            </div>

            <div class="form-group">
                <label for="start_date">START DATE</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $coupon->start_date }}" >
            </div>

            <div class="form-group">
                <label for="end_date">END DATE</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $coupon->end_date }}" >
            </div>

            <button type="submit" class="btn btn-primary">UPDATE COUPONS</button>
        </form>
    </div>
@endsection
