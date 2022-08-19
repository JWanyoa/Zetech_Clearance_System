<?php

namespace App\Http\Controllers\MyData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RolesStoreRequest;
use App\Http\Requests\RolesUpdateRequest;

use App\Models\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $roles = Roles::paginate(5);
        if($request->has('search')){
            $roles = Roles::where('role_name','like', "%{$request->search}%")->paginate(5);
        }
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesStoreRequest $request)
    {
        //
        //Save user data
        Roles::create([
            'role_name' => $request->role_name,
        ]);

        return redirect()->route('roles.index')->with('message', 'User Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        //
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesUpdateRequest $request, Roles $role)
    {
        //
        $role->update([
            'role_name' => $request->role_name,
        ]);
        return redirect()->route('roles.index')->with('message', 'Role Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        ////Deleting Data
        if($role->delete()){
            return redirect()->route('roles.index')->with('message', 'Role Deleted Successfully'); 
        }
    }
}
