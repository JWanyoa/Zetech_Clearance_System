<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $inputVal = $request->all();
   
        $this->validate($request, [
            'role_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password'], 'role_id' => $inputVal['role_id']))){
            if (auth()->user()->role_id == 1) {
                return redirect()->route('home');
            }elseif(auth()->user()->role_id == 2){
                return redirect()->route('hodHome');
            }elseif(auth()->user()->role_id == 3){
                return redirect()->route('registrarHome');
            }elseif(auth()->user()->role_id == 4){
                return redirect()->route('financeHome');
            }elseif(auth()->user()->role_id == 5){
                return redirect()->route('roHome');
            }elseif(auth()->user()->role_id == 6){
                return redirect()->route('librarianHome');
            }elseif(auth()->user()->role_id == 7){
                return redirect()->route('studentHome');
            }else{
                return redirect()->route('/');
            }
        }else{
            return redirect()->back()
                ->with('error','Email & Password are incorrect.');
        }
    }

}
