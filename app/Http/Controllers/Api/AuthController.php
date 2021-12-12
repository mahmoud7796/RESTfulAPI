<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseJson;

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('sanctumAuth')->plainTextToken;
            $success['name'] = $authUser;

            return $this->jsonResponse($success, 'data', 200, 'Login Successfully');
        } else {

            return $this->jsonResponse('UnAuthorized', 'data', 404, 'UnAuthorized');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // return $this->sendError('Error validation', $validator->errors());
            return $this->jsonResponse($validator->errors(), 'data', 500, 'Error validation');

        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $user->name;

        return $this->jsonResponse($success, 'data', 200, 'Register sucessfully');
    }

    public function apiLogout()
    {
        auth()->user()->tokens()->delete();
        return $this->jsonResponse('You are Logged Out Successfully', 'data', 200, 'You are Logged Out Successfully');

    }
}
