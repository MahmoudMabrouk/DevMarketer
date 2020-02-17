<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create')->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array([
            'display_name' => 'required|max:255',
            'name'         => 'required|max:255|alpha_dash|unique:roles,name',
            'description'  => 'sometimes|max:255'
        ]);

        $this->validate($request,$rules);
        $role = new Role();
        $role->display_name = $request->display_name;
        $role->name         = $request->name;
        $role->description  = $request->description;
        $role->save();

        if($request->permissions){
           $role->syncpermissions(explode(',',$request->permissions));
        }

        //Session::flash('success', 'Successfuly Create the new '.$role->display_name.' role in the database.');
        return redirect()->route('role.show',$role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        return view('manage.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        $permissions = Permission::all();
        return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array([
            'display_name' => 'required|max:255',
            'description'  => 'sometimes|max:255'
        ]);

        $this->validate($request,$rules);
        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description  = $request->description;
        $role->save();
        dd($request->permissions);
        if($request->permissions){
           $role->syncpermissions(explode(',',$request->permissions));
        }

        //Session::flash('success', 'Successfuly Updated the '.$role->display_name.' role in the database.');
        return redirect()->route('role.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
