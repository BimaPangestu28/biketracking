<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use \App\Libs\Response as Response;


class AuthenticationController extends Controller
{
    public $successStatus = 200;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('pityuApp')->accessToken;
            $success['name'] =  $user->name;

            return $this->response->success_response("Success get detail", $success, 200);
        } else {
            return $this->response->failed_response("Unauthorized", [], 401);
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
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();

        // Check e-mail already exists or no
        if (User::where('email', $input['email'])->count() > 0) {
            return $this->response->failed_response('E-mail already used', ["email" => "E-mail sudah digunakan"], 401);
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('pityuApp')->accessToken;
        $success['name'] =  $user->name;

        Auth::login($user, true);
        $user->sendEmailVerificationNotification();

        return $this->response->success_response("Success registered", $success, 201);
    }
}
