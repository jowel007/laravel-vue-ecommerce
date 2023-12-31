<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class authController extends Controller
{
    public function loginUser(Request $request){

        $validation = Validator::make($request->all(),
            [
                'email' => 'required|string|email|exists:users,email',
                'password' => 'required|string'

            ]);



//email not present in DB
        if($validation->fails()){
            return response()->json(['status'=> 400,'message'=>$validation->errors()->first()]);
        }else {
            $cred = array('email'=>$request->email,'password'=>$request->password);

            //right auth

            if (Auth::attempt($cred,false)) {
                if (Auth::User()->hasRole('admin')) {
                    return response()->json(['status'=> 200,'message'=>'Admin User','url'=>'admin/dashboard']);
                }else {
                    return response()->json(['status'=> 200,'message'=>'None User']);
                }

            }else{
                return response()->json(['status'=> 400,'message'=>'Wrong Credential']);
            }
        }
    }


}
