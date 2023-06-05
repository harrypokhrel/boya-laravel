<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ActivityController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Activity::orderBy('status', 'Asc')->get();
        return  view('admin.activity.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->emirates != ''){
            $request['city'] = $request->emirates;
        }
        $this->validate($request, $this->rules());

        if ($request->hasFile('featured_image')) {
            $folderPath = 'public/activities/';
            $image = $request->file('featured_image');
            $request['featured_image'] = $this->storeOrUpdate($folderPath, $image);
        }

        Activity::create($request->all());
        return redirect()->route('activity.index')->with('message','Activity Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(activity $activity)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = Activity::findOrFail($id);
        $roles = Role::get();
        return view('admin.activity.edit', compact('detail', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity $activity)
    {
        $activity = Activity::findOrFail($activity->id);
        if($request->emirates != ''){
            $request['city'] = $request->emirates;
        }
        $this->validate($request, $this->rules());

        if ($request->hasFile('featured_image')) {
            $folderPath = 'public/activities/';
            $image = $request->file('featured_image');
            $request['featured_image'] = $this->storeOrUpdate($folderPath, $image);
        }

        $activity->update($request->all());
        return redirect()->route('activity.index')->with('message','Activity Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back()->with('message', 'Activity deleted successfully');
    }

    public function rules($oldId = null, $sameSlugVal=false){
        $rules =  [
            'vendor_id'       => 'required',
            'title'           => 'required',
            'country'         => 'required',
            'price_weekday'   => 'required',
            'price_weekend'   => 'required',
            'tickets_per_time_slot'   => 'required',
            'opening_hour'    => 'required',
            'closing_hour'    => 'required',
            'featured_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        return $rules;
    }
}
