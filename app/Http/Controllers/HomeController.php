<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function hodindex()
    {
        return view('users.hod.home');
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
