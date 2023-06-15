<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use App\Models\Categories;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Tag;
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
        $details = Activity::get();
        return  view('admin.activity.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        $companies = Company::get();
        $tags = Tag::get();
        return  view('admin.activity.create', compact('categories', 'companies', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request['enable_shift_price'] == 'on'){
            $request['enable_shift_price'] = 1;
        } else {
            $request['enable_shift_price'] = 0;
        }

        if($request['shift_on_weekends'] == 'on'){
            $request['shift_on_weekends'] = 1;
        } else {
            $request['shift_on_weekends'] = 0;
        }

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

        $request['shift_price'] = json_encode($request->sp, JSON_FORCE_OBJECT);

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
        // dd($request['shift_price']);

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
        $categories = Categories::get();
        $companies = Company::get();
        $tags = Tag::get();
        $gallery = Gallery::where('activity_id', '=', $id)->orderBy('image_order', 'asc')->get();
        $detail = Activity::findOrFail($id);
        $roles = Role::get();
        
        return view('admin.activity.edit', compact('categories', 'companies', 'tags', 'detail', 'gallery', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity $activity)
    {
        $activityID =   $activity->id;
        $activity = Activity::findOrFail($activity->id);
        
        if($request['enable_shift_price'] == 'on'){
            $request['enable_shift_price'] = 1;
        } else {
            $request['enable_shift_price'] = 0;
        }

        if($request['shift_on_weekends'] == 'on'){
            $request['shift_on_weekends'] = 1;
        } else {
            $request['shift_on_weekends'] = 0;
        }

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

        $request['shift_price'] = json_encode($request->sp, JSON_FORCE_OBJECT);
        // dd($request['gallery_images']);

        if ($request->hasFile('gallery_images')) {
            $images = $request['gallery_images'];
            $records = Gallery::where('activity_id', $activity->id)->get();
            $i = count($records);
            foreach($images as $image){
                $filename = time().'-'.rand().'.'.$image->extension();
                $image->move(public_path('images/activities/gallery/'), $filename);
                $i++;

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

            }
        }

        $activity->update($request->all());
        return redirect()->route('activity.index')->with('message','Activity Added Successfully');
    }

    /**
     * Update the image order
     */
    public function updateImageOrder(Request $request)
    {
        $i = 0;
        $j = 1;
        $newImageOrder = $request->image_order_ids;
        $records = Gallery::where('activity_id', $request->activity_id)->get();
        $count  =   count($records);
        for($i=0;$i<$count;$i++){
            Gallery::where('activity_id', $request->activity_id)
                    ->where('id', $newImageOrder[$i])
                    ->update(['image_order' => $j]);
            $j++;
        }
        $data = [
            'success'   => true,
            'message'   => 'The images has been reordered.'
        ];
        return response()->json($data);
    }

    /**
     * Delete an image
     */
    public function deleteImage(Request $request)
    {
        $image = Gallery::findOrFail($request->imageKoId);
        $image->delete();

        $data = [
            'success'   => true,
            'message'   => 'The image has been deleted.'
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        $data = [ 
            'success' => true
        ];
        return response()->json($data);
    }

    public function rules($oldId = null, $sameSlugVal=false){
        $rules =  [
            'company_id'            => 'required',
            'title'                 => 'required',
            'price_weekday'         => 'required',
            'price_weekend'         => 'required',
            'tickets_per_time_slot' => 'required',
            'opening_hour'          => 'required',
            'closing_hour'          => 'required',
            // 'feature_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        return $rules;
    }

    public function search(Request $request)
    {
        $search = $request->input('company');

        $details = Activity::with('company')
            ->whereHas('company', function ($q) use ($search) {
                $q->where('title', "LIKE", "%{$search}%");
            })
            ->get();

        return view('admin.activity.list', compact('details'));
    }

    public function getShiftTiming(string $id){
        $owner_id   =   $id;
        $company    =   Company::where('id', '=', $owner_id)->first();

        $shift_timings  =   $company->shift_timing;
        $data = '';
        $data = '<div class="timing_price_ul_li_col">';
        if($shift_timings){
        $i = 1;
        $shift_timings    =   json_decode($shift_timings, true);
        foreach($shift_timings as $shift_timing){
        $data .= '<div><b class="shift__title">'.$shift_timing[1].'</b><input type="hidden" id="sp_'.$i.'_1" class="shift_timings_list" name="sp['.$i.'][1]" placeholder="Eg: Morning" value="'.$shift_timing[1].'">
            <input type="text" id="sp_'.$i.'_2" class="shift_timings_list" name="sp['.$i.'][2]" placeholder="Eg: 5% or 500">
            </div>';
            $i++; }
        }
        $data .= '</div>';
        return response()->json($data);
    }

}
