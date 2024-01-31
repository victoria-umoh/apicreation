<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return response()->json(['user' => $user, 'message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to register user.'], 500);
        }
    }
    public function login(Request $request)
    {
        try {
            // Validate user input
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // If validation fails, return a response with validation errors
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            // Retrieve credentials from the request (email and password)
            $credentials = $request->only('email', 'password');

            // Attempt to generate a JWT token using the provided credentials
            if (!$token = JWTAuth::attempt($credentials)) {
                // If unsuccessful, return a response indicating invalid credentials
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            // If successful, return a response with the generated JWT token
            return response()->json(compact('token'));
        } catch (\Exception $e) {
            // Catch any other exceptions and return a response
            return response()->json(['error' => 'Unable to log in.'], 500);
        }
    }

}
