@extends('layouts.backend')

@section('content')
    <section class="content-header">
        <h1>Boya Bookings</h1>
        <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Bookings</a></li>
            <li><a href="">List</a></li>
        </ol>
    </section>
    <div class="container">
        <form action="{{ route('bookings.index') }}" method="GET">
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" name="booking_id" id="booking_id" class="form-control" placeholder="Booking Id" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="string" name="time" id="time" class="form-control" placeholder="Time" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="date" name="date" id="date" class="form-control" placeholder="Date" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <select id="activity_id" name="activity_id" class="form-control" data-selected="">
                            <option value="">-- Select Activity --</option>
                                <option value="6">Gel Ball</option>
                                <option value="7">Football Zorbing</option>
                                <option value="8">Tube Sliding</option>
                                <option value="9">Mountain Slide Zorbing</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select id="status" name="status" class="form-control" data-selected="">
                            <option value="">-- Select Status --</option>
                            <option value="1" >Booked</option>
                            <option value="0" >Cancelled</option>
                            <option value="2" >Refunded</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select id="booking_type" name="booking_type"  class="form-control" data-selected="">
                            <option value="">-- Booking Type --</option>
                            <option value="online" >Online</option>
                            <option value="offline" >Offline (from backend)</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Search" class="btn btn-primary" style="max-width:100%">
        </form>
    </div>
    <hr>
    <div class="container">
        <div class="row">
        <div class="col-md-4">
            <div class="total_bookings">Total Bookings</div>
            <div class="total_bookings_count"><h3>0</h3></div>
        </div>
        <div class="col-md-4">
            <div class="total_commission">Total Commission (AED)</div>
            <div class="total_commission_count"><h3>0.0</h3></div>
        </div>
        <div class="col-md-4">
            <div class="total_amount">Total Amount (AED)</div>
            <div class="total_amount_count"><h3>0.0</h3></div>
        </div>
    </div>
    </div>
    <hr>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Bookings</h1>
            <a href="{{ route('bookings.calendar') }}" class="btn btn-primary">Calendar View</a>
            <a href="{{ route('bookings.exportCSV') }}" class="btn btn-primary">Export CSV</a>
            <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add New Booking</a>
        </div>

        <table id="admin-lte" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>BOOKING ID</th>
                    <th>ACTIVITY NAME</th>
                    <th>FULL NAME</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>MOBILE</th>
                    <th>NO. OF TICKETS</th>
                    <th>COMM(AED)</th>
                    <th>TOTAL</th>
                    <th>PLATFORM</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <!-- <td>{{ $booking->id }}</td> -->
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->activity_name }}</td>
                        <td>{{ $booking->first_name }}||{{ $booking->last_name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->mobile }}</td>
                        <td>{{ $booking->No_of_tickets }}</td>
                        <td>{{ $booking->sub_total }}</td>
                        <td>{{ $booking->total }}</td>
                        <td>{{ $booking->payment_method }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <!-- <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info">View</a> -->
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
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
