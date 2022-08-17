<?php

namespace App\Http\Controllers\MyData;

use App\Models\User;
use App\Models\Messages;
use App\Models\Departments;
use App\Models\Roles;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);
        $messages = Messages::all();
        if($request->has('search')){
            $users = User::where('user_name','like', "%{$request->search}%")->orWhere('email','like', "%{$request->search}%")->paginate(10);
        }
        return view('users.index', compact('users','messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Roles::all();
        $departments = Departments::all();
        return view('users.create', compact('departments','roles'));
    }

    public function getUser()
    {
        //
        return view('users.usersData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //Save user data
        User::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'User Successfully Created');
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
    public function edit(User $user)
    {
        //
        $departments = Departments::all();
        return view('users.edit', compact('user','departments'));
    }


    public function login()
    {
        //
        return view('users.hod.hodLogin');
    }

    public function registrarLogin()
    {
        //
        return view('users.registrar.registrarLogin');
    }


    public function financeLogin()
    {
        //
        return view('users.finance.financeLogin');
    }

    public function librarianLogin()
    {
        //
        return view('users.librarian.librarianLogin');
    }

    public function recordsLogin()
    {
        //
        return view('users.records.recordsLogin');
    }

    public function studentLogin()
    {
        //
        return view('users.student.studentLogin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        //
        $user->update([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('users.index')->with('message', 'User Details Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Deleting Data
        if(auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with('message', 'You are deleting yourself'); 
        }
        if($user->delete()){
            return redirect()->route('users.index')->with('message', 'User Deleted Successfully'); 
        }
    }
}
