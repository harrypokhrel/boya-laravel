<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use App\Models\Company;
use App\Models\Gallery;
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
        $companies = Company::get();
        return  view('admin.activity.create', compact('companies'));
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

        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time().'.'.$image->extension();
            $image->move(public_path('images/activities/featured/'), $filename);
            $request['featured_image'] = $filename;
        }

        $activity = Activity::create($request->all());
        $activityID = $activity->id;

        if ($request->hasFile('gallery_images')) {
            $images = $request['gallery_images'];
            $i = 1;
            foreach($images as $image){
                $filename = time().'-'.rand().'.'.$image->extension();
                $image->move(public_path('images/activities/gallery/'), $filename);

                try{
                    $gallery = new Gallery;
                    $gallery->activity_id   = $activityID;
                    $gallery->image_name    = $filename;
                    $gallery->image_order   = $i;
                    $gallery->save();
                }
                catch(Exception $e){
                    //
                }

                $i++;
            }
        }

        // dd($request);
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
        $companies = Company::get();
        $gallery = Gallery::where('activity_id', '=', $id)->get();
        $detail = Activity::findOrFail($id);
        $roles = Role::get();
        // dd($gallery);
        return view('admin.activity.edit', compact('companies', 'detail', 'gallery', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity $activity)
    {
        $activityID =   $activity->id;
        $activity = Activity::findOrFail($activity->id);
        if($request->emirates != ''){
            $request['city'] = $request->emirates;
        }
        $this->validate($request, $this->rules());

        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time().'.'.$image->extension();
            $image->move(public_path('images/activities/featured/'), $filename);
            $request['featured_image'] = $filename;
        }

        if ($request->hasFile('gallery_images')) {
            $images = $request['gallery_images'];
            $i = 1;
            foreach($images as $image){
                $filename = time().'-'.rand().'.'.$image->extension();
                $image->move(public_path('images/activities/gallery/'), $filename);

                try{
                    $gallery = new Gallery;
                    $gallery->activity_id   = $activityID;
                    $gallery->image_name    = $filename;
                    $gallery->image_order   = $i;
                    $gallery->save();
                }
                catch(Exception $e){
                    //
                }

                $i++;
            }
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
            'company_id'      => 'required',
            'title'           => 'required',
            'price_weekday'   => 'required',
            'price_weekend'   => 'required',
            'tickets_per_time_slot'   => 'required',
            'opening_hour'    => 'required',
            'closing_hour'    => 'required',
            'feature_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        return $rules;
    }
}
