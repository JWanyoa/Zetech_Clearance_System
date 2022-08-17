<?php

namespace App\Http\Controllers\MyData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\studentUpdateRequest;

use App\Models\Student;
use App\Models\Departments;
use App\Models\Roles;
use App\Models\User;
use App\Models\Program;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = Program::all();
        $students = Student::paginate(5);
        return view('students.index', compact('students','programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Departments::all();
        $roles = Roles::all();
        $users = User::all();
        $programs = Program::all();
        return view('students.create', compact('departments','programs','roles','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        //Save Student data
        Student::create([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('students.index')->with('message', 'Student Successfully Added');
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
    public function edit(Student $student)
    {
        //
        return view('students.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(studentUpdateRequest $request, Student $student)
    {
        //
        $student->update([
            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('students.index')->with('message', 'Student Details Successfully Updated');
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
