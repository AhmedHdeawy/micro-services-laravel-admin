<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            $user = Auth::user();
            $token = $user->createToken('admin')->accessToken;  

            return response(['token'    =>  $token ], Response::HTTP_ACCEPTED) ;
        }
        return response(['invalid Username or Passwor'], Response::HTTP_UNAUTHORIZED);
    }
    
    
    public function register(Request $request)
    {
        $user = User::create([
            'first_name'    =>  $request->input('first_name'),
            'last_name'    =>  $request->input('last_name'),
            'email'    =>  $request->input('email'),
            'password'    =>  bcrypt($request->input('password')),
            'role_id'    =>  $request->input('role_id'),
        ]);

        return response($user, Response::HTTP_CREATED);
    }
    
    
    public function profile()
    {
        $user = Auth::user();

        return response($user, Response::HTTP_OK);
    }

}
