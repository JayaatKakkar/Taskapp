<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Container\Attributes\DB;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:255",
            "email" => "required|string|email|unique:users",
            'password' => [
                'required',
                'string',
                'max:10',
                'regex:/[A-Z]/', // Uppercase letter
                'regex:/[a-z]/', // Lowercase letter
                'regex:/[\W_]/', // Special character
            ],
        ], [
            'password.max' => 'The password cannot be more than 10 characters.',
            'password.regex' => 'The password must include at least one uppercase letter, one lowercase letter, and one special character.',
            'password.regex:/[A-Z]/' => 'The password must contain at least one uppercase letter.',
            'password.regex:/[a-z]/' => 'The password must contain at least one lowercase letter.',
            'password.regex:/[\W_]/' => 'The password must contain at least one special character.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->usertype;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['message' => 'User created successfully'], 201);
        }

    }

    public function login(Request $request){
        $request->validate([
            "email"=>"required|string|email",
            "password"=>"required",
        ]);
        $user=User::where("email",$request->email)->first();
        //  error_log($user);
            // error_log(bcrypt($request->password));
        if(!empty($user) && Hash::check($request->password,$user->password)){
                $token=$user->createToken("mytoken")->accessToken;
                return response()->json([
                "status"=>true,
                "token"=>$token,
                "role"=>$user->role,
                "message"=>"User logged in"
                ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Invalid Credentials"
                ]);
        }

    }
}
