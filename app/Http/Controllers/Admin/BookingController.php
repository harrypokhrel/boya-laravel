<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->namespace = 'App\Http\Controllers\Admin';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(5);
    
        return view('admin.bookings.index', ['bookings' => $bookings])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company= Company::all();
        $activities=Activity::all();
        return view('admin.bookings.create', compact('company','activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
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
        $destinationPath = 'public/images';
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

    return view('admin.bookings.calendar', compact('bookings'));
}


public function exportCSV()
{
    // Logic to retrieve bookings for CSV export
    $bookings = Booking::all(); // Example code, adjust it as per your requirements

    // Generate CSV file content
    $csvData = "BOOKING ID,ACTIVITY NAME,FULL NAME,DATE,TIME,MOBILE,NO. OF TICKETS,COMM(AED),TOTAL,PLATFORM,STATUS\n";
    foreach ($bookings as $booking) {
        $csvData .= "{$booking->id},{$booking->activity_name},{$booking->first_name} {$booking->last_name},{$booking->date},{$booking->time},{$booking->mobile},{$booking->No_of_tickets},{$booking->sub_total},{$booking->total},{$booking->payment_method},{$booking->status}\n";
    }

    // Create the CSV file
    $fileName = 'bookings.csv';
    $filePath = public_path($fileName);
    file_put_contents($filePath, $csvData);

    // Download the CSV file
    return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
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
        $company=Company::all();
        $activities=Activity::all();
        return view ('admin.bookings.edit',compact('booking','company','activities'));
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
     
        return redirect()->route('bookings.index')
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

    public function search(Request $request)
    {
        $search = $request->input('user');

        $details = Booking::with('user')
            ->whereHas('user', function ($q) use ($search) {
                $q->where('title', "LIKE", "%{$search}%");
            })
            ->get();

        return  view('admin.bookings.index', compact('details'));
    }
}
