<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Booking Details</h1>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <th>Booking ID</th>
            <td>{{ $booking->booking_id }}</td>
        </tr>
        <tr>
            <th>Activity Name</th>
            <td>{{ $booking->activity_name }}</td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>{{ $booking->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $booking->last_name }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $booking->date }}</td>
        </tr>
        <tr>
            <th>Time</th>
            <td>{{ $booking->time }}</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td>{{ $booking->mobile }}</td>
        </tr>
        <tr>
            <th>No. of Tickets</th>
            <td>{{ $booking->no_of_tickets }}</td>
        </tr>
        <tr>
            <th>Sub Total</th>
            <td>{{ $booking->sub_total }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ $booking->total }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $booking->payment_method }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $booking->status }}</td>
        </tr>
        <tr>
            <th>Note</th>
            <td>{{ $booking->note }}</td>
        </tr>
        <tr>
            <th>Payment Note</th>
            <td>{{ $booking->payment_note }}</td>
        </tr>
        <tr>
            <th>Image</th>
            <td>{{ $booking->image }}</td>
        </tr>
    </table>
@endsection
