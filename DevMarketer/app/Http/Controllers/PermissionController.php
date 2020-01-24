<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->permission_type);
        if ($request->permission_type == 'basic') {
            $rules = array (
                'name'              =>  'required|max:255|unique:permissions,name',
                'display_name'      =>  'required|max:255',
                'description'       =>  'required|max:255',
            );
            $this->validate($request,$rules);

            $permission = new Permission();
            $permission->name           = $request->name;
            $permission->display_name   = $request->display_name;
            $permission->description    = $request->description;
            $permission->save();
            
            Session::flash('success', 'Permissions were all successfully added');
            return redirect()->route('permission.index');

        } else if($request->permission_type == 'crud'){
            $rules = array (
                'resource' => 'required|min:3|max:100|alpha'
            );
            $this->validate($request,$rules);
            $crud = explode(',', $request->crud_selected);
            if(count($crud)>0){
               
                foreach($crud as $item){
                    $name           = strtolower($item) . '-' . strtolower($request->resource);
                    $display_name   = ucwords($item . ' ' . $request->resource);
                    $description    = 'Allow a User to ' . ucwords($item) . ' a ' . ucwords($request->resource);
                    
                    $permission = new Permission();
                    $permission->name           = $name;
                    $permission->display_name   = $display_name;
                    $permission->description    =$description;
                    $permission->save();
                }
                Session::flash('success', 'Permissions were all successfully added');
                return redirect()->route('permission.index');
            }
        }else {
            dd('problem in save');
            Session::flash('danger','Sorry a problem accoured while creating new Permissions.');
            return redirect()->route('permission.create');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show')->withPermissions($permission);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit')->withPermission($permission);
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
        $rules = array (
            'name'              =>  'required|max:255|unique:permissions,name,'.$id,
            'display_name'      =>  'required|max:255',
            'description'       =>  'required|max:255',
        );
        $this->validate($request,$rules);

        $permission = Permission::findOrFail($id);
        $permission->name           = $request->name;
        $permission->display_name   = $request->display_name;
        $permission->description    = $request->description;
        $permission->save();

        if($permission->save()){
                return redirect()->route('permission.show',$id);
        }else{
                Session::flash('error','Sorry! some Problem acourded in Update Permission');
                return redirect()->route('permission.edit',$id);
        }
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
