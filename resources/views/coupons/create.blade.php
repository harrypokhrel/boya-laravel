@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya Coupons</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Coupons</a></li>
		<li><a href="">Add</a></li>
	</ol>
</section>
    <div class="container">
        <h1>ADD NEW COUPON</h1>
        <form action="{{ route('coupons.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">TITLE</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="category">SELECT CATEGORY</label>
                        <input type="text" name="category" id="category" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="coupon_code">COUPON CODE</label>
                        <input type="text" name="coupon_code" id="coupon_code" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="coupon_type">COUPON TYPE</label>
                        <input type="text" name="coupon_type" id="coupon_type" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="activity">SELECT ACTIVITY</label>
                        <input type="activity" name="activity" id="activity" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="start_date">START DATE</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="end_date">END DATE</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="expiry_date">EXPIRY DATE</label>
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="discount_amount">AMOUNT/PERCENTAGE OFF</label>
                        <input type="string" name="discount_amount" id="discount_Amount" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="coupon_type">SELECT COUPON TYPE</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="coupon_type" id="flat" value="flat" required>
                            <label class="form-check-label" for="flat">Flat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="coupon_type" id="percentage" value="percentage" required>
                            <label class="form-check-label" for="percentage">Percentage</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="coupon_used">IS THIS COUPON USE FOR SINGLE TIME OR CAN BE USED MULTIPLE TIMES ?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="coupon_used" id="single" value="single" required>
                    <label class="form-check-label" for="single">Single</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="activity" id="multiple" value="multiple" required>
                    <label class="form-check-label" for="multiple">Multiple</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ADD COUPON</button> 
        </form>
    </div>
@endsection
