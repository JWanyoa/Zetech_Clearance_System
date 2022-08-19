<?php

namespace App\Http\Controllers\MyData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DepartmentStoreRequest;

use App\Models\Departments;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $departments = Departments::paginate(5);
        if($request->has('search')){
            $departments = Departments::where('department_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        //
        //Save Program data
        Departments::create([
            'department_name' => $request->department_name,
        ]);

        return redirect()->route('departments.index')->with('message', 'Department Successfully Added');
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
    public function edit(Departments $department)
    {
        //
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentStoreRequest $request, Departments $department)
    {
        //
        $department->update([
            'department_name' => $request->department_name,
        ]);
        return redirect()->route('departments.index')->with('message', 'Department Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $department)
    {
        //Deleting Data
        if($department->delete()){
            return redirect()->route('departments.index')->with('message', 'Department Deleted Successfully'); 
        }
    }
}
