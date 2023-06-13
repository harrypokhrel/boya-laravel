<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::latest()->paginate(5);
    
        return view('admin.categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'               => 'nullable',
            'categories_name'  => 'nullable',
            'parent_cat_id'    => 'nullable',
            'image'            => 'nullable',
            'status'           => 'nullable',
        ]);
    
        Categories::create($request->all());
     
        return redirect()->route('admin.categories.index')
                        ->with('success','categories created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      return view('admin.categories.show',compact('categoriess')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id'               => 'required',
            'categories_name'  => 'required',
            'parent_cat_id'    => 'required',
            'image'            => 'required',
            'status'           => 'required',
           
        ]);
    
        Categories::update($request->all());
     
        return redirect()->route('admin.categories.index')
                        ->with('success','categories updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories->delete();
    
        return redirect()->route('admin.categories.index')
                        ->with('success','categories deleted successfully'); 
    }
}


