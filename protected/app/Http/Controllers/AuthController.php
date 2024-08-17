<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        //set validation token
        if ($request->isMethod('get')) {
            return csrf_token();
        } else {
            return response()->json([
                'message' => 'Method not allowed',
            ], 401);
        }
    }

    public function __invoke(Request $request)
    {
        //set validation
        if ($request->isMethod('post')) {
            $user = User::where('email', $request->email)->first();


            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //get credentials from request
            $credentials = $request->only('email', 'password');

            //if auth failed
            // if (!$token = auth()->guard('api')->attempt($credentials)) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Email atau Password Anda salah',
            //     ], 401);
            // }

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau Password Anda salah',
                ], 401);
            }

            $token = $user->createToken('login_token', ['*'], now()->addSeconds(60))->plainTextToken;

            return response()->json([
                'message' => 'Login success',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        } else {
            return response()->json([
                'message' => 'Method not allowed',
            ], 401);
        }
    }
}
