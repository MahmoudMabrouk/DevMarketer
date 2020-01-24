<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Sesstion;
Use Hash;
//use Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::orderBy('id','desc')->paginate(10);
        //dd($users);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|unique:users',
        );
        $this->validate($request,$rules);
        if (!empty($request->password)) {
            $password = trim($request->password);
        }else {
            // # set the manual password
            // $length = 10;
            // $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            // $str = '';
            // $max = mb_strlen($keyspace, '8bit') - 1;
            // for ($i = 0; $i < $length; ++$i) {
            //     $str .= $keyspace[random_int(0, $max)];
            // }
            // $password = '$str';
            $password = 'password';
        }
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($password);
        if ($user->save()) {

            return redirect()->route('users.show',$user->id);
        } else {
            
            Session::flash('danger','Sorry a problem accoured while creating this user.');
            return redirect()->route('users.create');
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
        $user = User::where('id',$id)->with('Roles')->first();
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('Roles')->first();
        $roles = Role::all();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
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
        $rules = array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|unique:users,email,'.$id,
        );
        $this->validate($request,$rules);
       
       
        $user = User::findOrFail($id);
        $user->name     =   $request->name;
        $user->email    =   $request->email;

        if (!empty($request->password)) {
         
            $user->password = Hash::make($request->password);
        } 
        $user->save();
        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('users.show', $id);
        
  
        // if ($user->save()) {
        //     # code...
        //     return redirect()->route('users.show',$id);
        // } else {
        //     # code...
        //     Session::flash('error','Sorry! some Problem accourded during Update User');
        //     return redirect()->route('users.edit',$id);
        // }
        
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

