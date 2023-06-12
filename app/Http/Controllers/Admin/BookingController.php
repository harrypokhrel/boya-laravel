<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(5);
    
        return view('admin.bookings.index',compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        // 'booking_id'     => 'required',
        'activity_name'  => 'nullable',
        'first_name'     => 'nullable',
        'last_name'      => 'nullable',
        'email'          => 'nullable',
        'date'           => 'nullable',
        'time'           => 'nullable',
        'mobile'         => 'nullable',
        'No_of_tickets'  => 'nullable',
        'sub_total'      => 'nullable',
        'total'          => 'nullable',
        'payment_method' => 'nullable',
        'status'         => 'nullable',
        'note'           => 'nullable',
        'payment_note'   => 'nullable',
        'image'          => 'nullable',
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = $profileImage;
    }
    
    Booking::create($input);

    return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
}


    public function calendarView()
    {
         $bookings = Booking::all();

        return view('bookings.calendar', compact('bookings'));
    }

    public function exportCSV()
    {
        $fileName = 'bookings.csv';

        return Excel::download(new BookingsExport, $fileName);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view ('admin.bookings.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view ('admin.bookings.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'id'             => 'required',
            'booking_id'     => 'required',
            'activity_name'  => 'required',
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required',
            'date'           => 'required',
            'time'           => 'required',
            'mobile'         => 'required',
            'No_of_tickets'  => 'required',
            'sub_total'      => 'required',
            'total'          => 'required',
            'payment_method' => 'required',
            'status'         => 'required',
            'note'           => 'required',
            'payment_note'   => 'required',
            'image'          => 'required',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'public/images/bookings';
            $depositSlip = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }  
        else{
            unset($input['image']);
        }
        Booking::create($input);
     
        return redirect()->route('admin.bookings.index')
                        ->with('success','Bookings created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
     
        return redirect()->route('bookings.index')
                        ->with('success','Booking deleted successfully');
    }
}
