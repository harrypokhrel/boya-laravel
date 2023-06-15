@extends('layouts.backend')

@section('content')
<section class="content-header">
	<h1>Boya Bookings</h1>
	<ol class="breadcrumb">
		<li><a href="">Dashboard</a></li>
		<li><a href="">Bookings</a></li>
		<li><a href="">Add</a></li>
	</ol>
</section>
<div class="container">
    <h1>NEW BOOKING FORM</h1>

    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">FIRST NAME</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">LAST NAME</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mobile">MOBILE</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="date">DATE</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="time">TIME</label>
                        <input type="time" name="time" id="time" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="company_name">COMPANY NAME</label>
                            <select id="company_name" name="company_name" class="form-control" data-selected="">
                                <option value="">-- Select Company --</option>
                                    <option value="6">Gel Ball</option>
                                    <option value="7">Football Zorbing</option>
                                    <option value="8">Tube Sliding</option>
                                    <option value="9">Mountain Slide Zorbing</option>
                            </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="activity_name">ACTIVITY NAME</label>
                            <select id="activity_name" name="activity_name" class="form-control" data-selected="">
                                <option value="">-- Select Activity --</option>
                                    <option value="6">Gel Ball</option>
                                    <option value="7">Football Zorbing</option>
                                    <option value="8">Tube Sliding</option>
                                    <option value="9">Mountain Slide Zorbing</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="No_of_tickets">NO. OF TICKETS</label>
                        <select id="No_of_tickets" class="form-control" name="No_of_tickets">
                        <!-- Generate options for numbers 1 to 30 -->
                        <?php
                            for ($i = 1; $i <= 30; $i++) {
                            echo "<option value='$i'>$i</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="Sub_total">SUB TOTAL</label>
                        <input type="string" name="Sub_total" id="Sub_total" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="total"> TOTAL</label>
                        <input type="string" name="total" id="total" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="payment_method">PAYMENT METHOD</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="payment_method" required>
                            <label class="form-check-label" for="online_payment">Online Payment</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="payment_method" required>
                            <label class="form-check-label" for="cash">Cash</label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="coupon_used">STATUS</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="paid" value="paid" required>
                            <label class="form-check-label" for="paid">Paid</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="unpaid" value="unpaid" required>
                            <label class="form-check-label" for="unpaid">Unpaid</label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="image">DEPOSIT SLIP</label>
                        <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" id="note" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="payment_note">Payment Note</label>
                    <textarea name="payment_note" id="payment_note" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ADD BOOKING</button> 
        </form>
    </div>
    </form>
</div>

@endsection
