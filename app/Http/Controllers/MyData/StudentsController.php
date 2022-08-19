<?php

namespace App\Http\Controllers\MyData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\studentUpdateRequest;

use App\Http\Requests\RemarksStoreRequest;

use App\Models\Student;
use App\Models\Departments;
use App\Models\Roles;
use App\Models\User;
use App\Models\Program;
use App\Models\Remarks;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $programs = Program::all();
        $students = Student::paginate(5);
        if($request->has('search')){
            $students = Student::where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('students.index', compact('students','programs'));
    }

    public function selectApprovedList()
    {
        $departments = Departments::all();
        $programs = Program::all();
        $approved = 'approved';
        $studentsApproved = Student::where('status_of_graduation','like', "{$approved}")->paginate(5);
        return view('students.approvedList', compact('studentsApproved','programs','departments'));

    }

    public function getApprovedStudents(Request $request)
    {
        //
        $approved = 'approved';

        $departments = Departments::all();
        $programs = Program::all();
        $studentsApproved = Student::where('status_of_graduation','=', "{$approved}")->paginate(5);
        if($request->has('search')){
            $studentsApproved = Student::where('status_of_graduation','=', "{$approved}")->where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('users.hod.approvedStudents', compact('departments','programs','studentsApproved'));
    }

    public function getStudentNames(Request $request, $department_id)
    {
        //
        $confirmed = 'confirmed';
        $departments = Departments::all();
        $programs = Program::all();
        $allStudents = Student::where('confirmed','=', "{$confirmed}")->where('department_id','=',"{$department_id}")->paginate(5);
        if($request->has('search')){
            $allStudents = Student::where('confirmed','=', "{$confirmed}")->where('department_id','=',"{$department_id}")->where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('users.hod.nameConfirm', compact('departments','programs','allStudents'));
    }

    public function viewAllStudents(Request $request)
    {
        //
        $departments = Departments::all();
        $programs = Program::all();
        $allStudents = Student::paginate(5);
        if($request->has('search')){
            $allStudents = Student::where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('users.hod.viewAll', compact('departments','programs','allStudents'));
    }

    public function viewStudents(Student $student, Request $request)
    {
        //
        $departments = Departments::all();
        $programs = Program::all();
        $students = Student::paginate(5);
        if($request->has('search')){
            $students = Student::where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('students.viewStudents', compact('students','programs','departments'));
    }


    public function viewStudent($student_id)
    {
        //
        $departments = Departments::all();
        $programs = Program::all();
        $student = Student::find($student_id);
        return view('users.hod.view', compact('departments','programs','student'));
    }


    public function graduationList($department_id, Request $request)
    {
        $departments = Departments::all();
        $programs = Program::all();
        $students = Student::where('department_id', '=', "{$department_id}")->paginate(5);
        if($request->has('search')){
            $students = Student::where('department_id', '=', "{$department_id}")->where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('users.hod.graduationList', compact('department_id','departments','programs','students'));
    }


    public function createList($department_id)
    {
        $department = Departments::find($department_id);
        $programs = Program::where('department_id','=',"{$department_id}")->get();
        return view('users.hod.createList',compact('department','programs'));
    }


    public function addRemarks($department_id, $student_id, Request $request, RemarksStoreRequest $remarksRequest)
    {
        $departments = Departments::all();
        $programs = Program::all();
        $students = Student::where('department_id', '=', "{$department_id}")->paginate(5);
        $studentData = Student::find($student_id);

        if($remarksRequest->has('save'))
        {
            //Save Remarks
            $saveRemarks = Remarks::create([
                'remark' => $remarksRequest->remark,
                'user_id' => $remarksRequest->user_id,
                'remark_to' => $remarksRequest->remark_to,
                'issue' => $remarksRequest->issue,
            ]);

            return redirect()->route('users.hod.addRemarks')->with('message', 'Remark Successfully Created');
        }

        

        if($request->has('search')){
            $students = Student::where('department_id', '=', "{$department_id}")->where('first_name','like', "%{$request->search}%")->orWhere('middle_name','like', "%{$request->search}%")->orWhere('last_name','like', "%{$request->search}%")->paginate(20);
        }
        return view('users.hod.addRemarks', compact('department_id','departments','programs','students','studentData','student_id'));
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
            'guardianPhone' => $request->guardianPhone,
            'admissionNumber' => $request->admissionNumber,
            'yearOfAdmission' => $request->yearOfAdmission,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('students.index')->with('message', 'Student Successfully Added');
    }

    public function saveStudents(StudentStoreRequest $request)
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
            'guardianPhone' => $request->guardianPhone,
            'admissionNumber' => $request->admissionNumber,
            'yearOfAdmission' => $request->yearOfAdmission,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('users.hod.graduationList', $request->department_id)->with('message', 'Student Successfully Added');
    }

    public function createListProcess(StudentStoreRequest $request, $department_id)
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
            'guardianPhone' => $request->guardianPhone,
            'admissionNumber' => $request->admissionNumber,
            'yearOfAdmission' => $request->yearOfAdmission,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('users.hod.graduationList',['department_id'=>$department_id])->with('message', 'Graduating Student Successfully Added');
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
    public function edit(Student $student, Request $request)
    {
        //
        $departments = Departments::all();
        $programs = Program::all();
        $data = Student::where('student_id', $request->student_id)
       ->update([
           'status_of_graduation' => $request->approval
        ]);
        if($data)
        {
            return redirect()->route('students.index')->with('message', 'Student Records Successfully Approved');
        }
        return view('students.edit', compact('student','departments','programs'));
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
            'guardianPhone' => $request->guardianPhone,
            'admissionNumber' => $request->admissionNumber,
            'yearOfAdmission' => $request->yearOfAdmission,
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
    public function destroy(Student $student)
    {
        //
        //Deleting Data
        if($student->delete()){
            return redirect()->route('students.index')->with('message', 'Student Deleted Successfully'); 
        }
    }
}
