<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(5);
    
        return view('coupons.index',compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('coupons.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'           => 'nullable',
            'coupon_code'  => 'nullable',
            'coupon_type'  => 'nullable',
            'activity'     => 'nullable',
            'start_date'   => 'nullable',
            'end_date'     => 'nullable',
        ]);
    
        $activity = Str::limit($request->input('activity'), 255); // Truncate to 255 characters (or adjust the length as per your column's definition)
    
        $input = $request->all();
        $input['activity'] = $activity;
    
        Coupon::create($input);
    
        return redirect()->route('coupons.index')
                        ->with('success', 'Coupons created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id'           => 'required',
            'coupon_code'  => 'required',
            'coupon_type'  => 'required',
            'activity'     => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required',
        ]);
    
        Coupon::update($request->all());
     
        return redirect()->route('coupons.index')
                        ->with('success','Coupons updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon->delete();
    
        return redirect()->route('coupons.index')
                        ->with('success','Coupon deleted successfully'); 
    }
}
