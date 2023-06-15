@extends('layouts.backend')

@section('content')
    <section class="content-header">
        <h1>Boya Bookings</h1>
        <ol class="breadcrumb">
            <!-- ... -->
        </ol>
    </section>

    <div class="container">
        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var bookings = {!! json_encode($bookings) !!};

            var events = bookings.map(function(booking) {
                return {
                    title: booking.activity_name,
                    start: booking.date,
                    // Add more event properties if needed
                };
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // Customize your calendar options here
                events: events,
                // Add more calendar options if needed
            });

            calendar.render();
        });
    </script>
@endsection
