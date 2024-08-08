<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            ], 405);
        }
    }

    public function __invoke(Request $request)
    {
        //set validation
        if ($request->isMethod('post')) {
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
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau Password Anda salah'
                ], 401);
            }

            return response()->json([
                'message' => 'Login success',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);

        } else {
            return response()->json([
                'message' => 'Method not allowed',
            ], 405);
        }
    }

}
