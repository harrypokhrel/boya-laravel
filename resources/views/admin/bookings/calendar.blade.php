@extends('layouts.backend')

@section('content')
    <div class="container">
        <div id="calendar"></div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '{{ route('bookings.calendar-data') }}'
            });
        });
    </script>
@endsection
