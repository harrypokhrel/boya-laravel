<!-- edit.blade.php -->

@extends('layouts.backend')

@section('content')
    <h1>Edit Booking</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Add input fields for all the required fields -->
        <input type="text" name="booking_id" placeholder="Booking ID" value="{{ $booking->booking_id }}">
        <input type="text" name="activity_name" placeholder="Activity Name" value="{{ $booking->activity_name }}">
        <input type="text" name="first_name" placeholder="First Name" value="{{ $booking->first_name }}">
        <input type="text" name="last_name" placeholder="Last Name" value="{{ $booking->last_name }}">
        <input type="date" name="date" placeholder="Date" value="{{ $booking->date }}">
        <input type="time" name="time" placeholder="Time" value="{{ $booking->time }}">
        <input type="text" name="mobile" placeholder="Mobile" value="{{ $booking->mobile }}">
        <input type="number" name="no_of_tickets" placeholder="No. of Tickets" value="{{ $booking->no_of_tickets }}">
        <input type="number" name="sub_total" placeholder="Sub Total" value="{{ $booking->sub_total }}">
        <input type="number" name="total" placeholder="Total" value="{{ $booking->total }}">
        <input type="text" name="payment_method" placeholder="Payment Method" value="{{ $booking->payment_method }}">
        <input type="text" name="status" placeholder="Status" value="{{ $booking->status }}">
        <input type="text" name="note" placeholder="Note" value="{{ $booking->note }}">
        <input type="text" name="payment_note" placeholder="Payment Note" value="{{ $booking->payment_note }}">
        <input type="file" name="image">

        <button type="submit">Update Booking</button>
    </form>
@endsection
