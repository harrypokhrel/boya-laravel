<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(5);
    
        return view('admin.tags.index',compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.tags.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'               => 'nullable',
            'tag_name'         => 'nullable',
            'image'            => 'nullable',
            'status'           => 'nullable',
        ]);
    
        Tag::create($request->all());
     
        return redirect()->route('tags.index', compact('tags'))
        ->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //   return view('admin.tags.show',compact('id')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id'               => 'required',
            'tag_name'         => 'required',
            'image'            => 'required',
            'status'           => 'required',
           
        ]);
    
        Tag::update($request->all());
     
        return redirect()->route('admin.tags.index')
                        ->with('success','tags updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $tags = Tag::findOrFail($id);
    $tags->delete();

    return redirect()->route('tags.index')
                    ->with('success', 'Tag deleted successfully'); 
}

}

