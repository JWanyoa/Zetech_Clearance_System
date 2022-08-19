<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

use App\Models\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approved = 'Approved';
        $students = Student::all();
        $studentsApproved = Student::where('status_of_graduation','LIKE',"{$approved}%")->get();
        $studNumber = $students->count();
        $studApprovedNumber = $studentsApproved->count();
        return view('home',compact('students','studentsApproved','studNumber','studApprovedNumber'));
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function hodindex()
    {
        $departments = Departments::all();
        $students = Student::all();
        $approved = Student::where('status_of_graduation','=','approved');
        return view('users.hod.home', compact('departments','students','approved'));
    }

    public function registrarindex()
    {
        return view('users.registrar.home');
    }

    public function financeindex()
    {
        return view('users.finance.home');
    }

    public function roindex()
    {
        return view('users.records.home');
    }

    public function libindex()
    {
        return view('users.librarian.home');
    }

    public function studentindex()
    {
        return view('users.student.home');
    }


    public function hodLogin()
    {
        return view('hodLogin');
    }


    public function handleAdmin()
    {
        return view('hodLogin');
    }  
}
