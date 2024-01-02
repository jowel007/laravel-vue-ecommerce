<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
use App\Traits\ApiResponse;

class ProfileController extends Controller
{
    use ApiResponse;

    public function index(){
        return view('admin/profile');
    }

    public function store(Request $request){

        //  print_r($request->all()); die();

        $validation = Validator::make($request->all(),
        [
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|unique:users,email,'.Auth::user()->id,
            'image'   => 'mimes:jpeg,png,jpg,gif|max:5120',//max 5 MB
            'address'    => 'required|string|max:255',
            'phone' => 'string|max:255',
            'twitter_link' => 'string|max:255',
            'instagram_link' => 'string|max:255',
            'fb_link' => 'string|max:255',
        ]);
   
        if($validation->fails()){
            return $this->error($validation->errors()->first(),400,[]);
            // return response()->json(['status'=>400,'message'=>$validation->errors()->first()]);
        }else {
            if ($request->hasFile('image')) {
                $image_name ='images/'.$request->name.time().'.'.$request->image->extension();
                $request->image->move(public_path('images/'),$image_name);
            }else {
                $image_name = Auth::user()->image;
            }

            $user = User::updateOrCreate(
            ['id'=>Auth::user()->id],
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'image'=>$image_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'twitter_link'=>$request->twitter_link,
                'instagram_link'=>$request->instagram_link,
                'fb_link'=>$request->fb_link,
            ]);

            // return response()->json(['status'=> 200,'message'=>'Successfully Updated']);
            return $this->success([],'Successfully Updated');
        }
        
    }



}
