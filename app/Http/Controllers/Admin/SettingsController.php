<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function profile()
    {
        $id = auth()->user()->id;
        $detail = User::findOrFail($id);
        $roles = Role::get();
        return view('admin.settings.profile', compact('roles', 'detail'));
    }

    public function profileUpdate(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $input = $this->validate(request(), [
            'name'      => 'required',
            'phone'     => 'required',
            'password'  => 'nullable|confirmed',
            'password_confirmation' => 'nullable'
        ]);

        if(isset($request->password)){
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user->update($input);

        $id = auth()->user()->id;
        $detail = User::findOrFail($id);
        return redirect()->route('settings.profile', compact('detail'))->with('message','Profile Updated Successfully');
    }
}
