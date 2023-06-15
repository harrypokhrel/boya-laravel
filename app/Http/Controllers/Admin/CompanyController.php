<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Company::orderBy('id', 'Asc')->get();
        return  view('admin.company.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('Activity Owner')->get();
        return view('admin.company.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->emirates != ''){
            $request['city'] = $request->emirates;
        }
        if($request->st != ''){
            $request['shift_timing'] = json_encode($request->st, JSON_FORCE_OBJECT);
        }
        $this->validate($request, $this->rules());

        Company::create($request->all());
        return redirect()->route('company.index')->with('message','Company Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::role('Activity Owner')->get();
        $detail = Company::findOrFail($id);
        return view('admin.company.edit', compact('users', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        if($request->emirates != ''){
            $request['city'] = $request->emirates;
        }
        if($request->st != ''){
            $request['shift_timing'] = json_encode($request->st, JSON_FORCE_OBJECT);
        }
        $this->validate($request, $this->rules());

        $company->update($request->all());
        return redirect()->route('company.index')->with('message','Company Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        $data = [ 
            'success' => true
        ];
        return response()->json($data);
    }

    public function rules($oldId = null, $sameSlugVal=false){
        $rules =  [
            'title'                 => 'required',
            'comission_percentage'  => 'required',
            'country'               => 'required',
            'city'                  => 'required',
            'contact_number'        => 'required'
        ];

        return $rules;
    }

    public function search(Request $request)
    {
        $search = $request->input('user');

        $details = Company::with('user')
            ->whereHas('user', function ($q) use ($search) {
                $q->where('name', "LIKE", "%{$search}%");
            })
            ->get();

        return  view('admin.company.list', compact('details'));
    }
}
