<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseApiController
{
    public $successStatus = 200;


    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $meta = [
                'token' =>  $user->createToken('MyApp')-> accessToken
            ];

            return $this->transformDataModInclude($user, '', new UserTransformer(), 'Users' , $meta);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
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
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $request['username'] = str_slug($request->name);
        $request['role_id'] =  2;

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $meta = [
            'token' =>  $user->createToken('MyApp')-> accessToken
        ];
        return $this->transformDataModInclude($user, '', new UserTransformer(), 'Users' , $meta);
    }



    public function logout(){
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json(
            [
                "meta" => [
                    'message' => 'Successfully Logged Out'
                ]
            ]
        );
    }


    public function details()
    {
        $user = Auth::user();
        return response()->json(['data' => $user], $this-> successStatus);
    }
}
