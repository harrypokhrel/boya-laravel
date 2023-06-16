
@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">FIRST NAME</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{$booking->first_name}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">LAST NAME</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{$booking->last_name}}" >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{$booking->email}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mobile">MOBILE</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$booking->mobile}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="date">DATE</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{$booking->date}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="time">TIME</label>
                        <input type="time" name="time" id="time" class="form-control" value="{{$booking->time}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="company_name">COMPANY NAME</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{$booking->company_name}}">
                            <!-- <select id="company_name" name="company_name" class="form-control" data-selected="">
                                <option value="">-- Select Company --</option>
                                    <option value="6">Gel Ball</option>
                                    <option value="7">Football Zorbing</option>
                                    <option value="8">Tube Sliding</option>
                                    <option value="9">Mountain Slide Zorbing</option>
                            </select> -->
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="activity_name">ACTIVITY NAME</label>
                            <select id="activity_name" name="activity_name" class="form-control" value="{{$booking->activity_name}}" data-selected="">
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
                        <select id="No_of_tickets" class="form-control" name="No_of_tickets" value="{{$booking->No_of_tickets}}">
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
                        <label for="sub_total">SUB TOTAL</label>
                        <input type="string" name="sub_total" id="sub_total" class="form-control" value="{{$booking->sub_total}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="total"> TOTAL</label>
                        <input type="string" name="total" id="total" class="form-control" value="{{$booking->total}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="payment_method">PAYMENT METHOD</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="payment_method">
                            <label class="form-check-label" for="online_payment">Online Payment</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="payment_method">
                            <label class="form-check-label" for="offline">Offiline</label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="coupon_used">STATUS</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="paid" value="paid" >
                            <label class="form-check-label" for="paid">Paid</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="unpaid" value="unpaid" >
                            <label class="form-check-label" for="unpaid">Unpaid</label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="image">DEPOSIT SLIP</label>
                        <input type="file" name="image" id="image" class="form-control-file" value="{{$booking->image}}" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="note">NOTE</label>
                    <textarea name="note" id="note" class="form-control" value="{{$booking->note}}" rows="4"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="payment_note">PAYMENT NOTE</label>
                    <textarea name="payment_note" id="payment_note" class="form-control" value="{{$booking->payment_note}}" rows="4"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">UPDATE BOOKING</button> 
        </form>
    </div>
    </form>
</div>

@endsection
