<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class APIController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register1(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //$token = Auth::login($user);
        $token = JWTAuth::fromUser($user);
        //var_dump($user1);


        //Get access token
        $access_token = $request->header('Authorization');

        // break up the string to get just the token
        $auth_header = explode(' ', $access_token);
        
        //$token = $auth_header[1];
        
        // break up the token into its three parts
        $token_parts = explode('.', $token);
        
        $token_header = $token_parts[0];

        // base64 decode to get a json string
        $token_header_json = base64_decode($token_header);
        
        // then convert the json to an array
        $token_header_array = json_decode($token_header_json, true);
        
        $user_token = $token_header_array['jti'];
        
        // find the user ID from the oauth access token table
        // based on the token we just got
        $user_id = DB::table('oauth_access_tokens')->where('id', $user_token)->first();

        

        // then retrieve the user from it's primary key
        $user = User::find($user_id->id);

        echo $user->id ?? '';
        exit();



        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
