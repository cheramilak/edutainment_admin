<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        if($validator->fails())
        {
            return $this->validationError($validator->errors()->first());
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 0;
        $user->status = 1;

        $user->save();
        $token = $user->createToken(User::USER_TOKEN);
        $data = [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
        return $this->success($data,'Success');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string|'
        ]);

        if($validator->fails())
        {
            return $this->validationError($validator->errors()->first());
        }
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return $this->validationError('Wrong email address');
        }
        if(!Hash::check($request->password,$user->password)){
            return $this->validationError('Wrong password');
        }
        $token = $user->createToken(User::USER_TOKEN);
        $data = [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
        return $this->success($data,'Success');
    }
}