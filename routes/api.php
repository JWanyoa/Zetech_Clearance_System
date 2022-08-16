<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users/create', function(Request $request){
    $data = $request->all();

    if(!User::where('email', '=', $data['email'])->exists()){
        $user = User::create([
            "name"=> $data['name'],
            "email"=> $data['email'],
            "password"=> Hash::make($data['password'])
        ]);

        if(empty($user->id))
        {
            return[
            "success"=>false,
            "response"=>[
                "error"=>"An unexpected error occured"
            ]
        ];
        }
        else
        {
            return[
            "success"=>true,
            "response"=>[
                "user"=>$user
            ]
        ];
        }
    }
    else{
        return[
            "success"=>false,
            "response"=>[
                "error"=>"The user already exists"
            ]
        ];
    }
});