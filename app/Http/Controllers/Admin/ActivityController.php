<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use DB;

class ActivityController extends Controller
{
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
        // $post = new Activity;
        $this->validate($request, $this->rules());
        Activity::create($request->all());
        // $value = $request->except('status');
        // $value['url'] = Str::slug($request->title, '-');
        // $value['status'] = is_null($request->publish)? 0 : 1 ;
        // if($request->image){
        //     $image=$this->imageProcessing($request->file('image'));
        //     $value['image'] = $image;
        // }
        // dd($value);
        // $this->page->create($value);
        // $post->save();
        // $this->save($request);
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
    public function edit(activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activity $activity)
    {
        //
    }

    public function imageProcessing($image)
    {
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $listingPath = public_path('images/listing');
       $mainPath = public_path('images/main');
       $img = Image::make($image->getRealPath());
       $img->fit(200, 100)->save($listingPath.'/'.$input['imagename']);

       $img1 = Image::make($image->getRealPath());
       $img1->fit(751, 339)->save($mainPath.'/'.$input['imagename']);
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }

    public function rules($oldId = null, $sameSlugVal=false){
        $rules =  [
          'vendor_id'   => 'required',
          'title'       => 'required',
          'country'     => 'required',
          'city'        => 'required'
  
        ];
        // if($sameSlugVal){
        //       $rules['slug'] = 'unique:pages,slug,'.$oldId.'|max:255';
        //   }
        return $rules;
    }
}
