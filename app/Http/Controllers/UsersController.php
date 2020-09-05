<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function register(Request $request){

    	//echo "<pre>"; print_r($request); die;
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$user = new User;
    		$user->name = $data['name'];
    		$user->email = $data['email'];
    		$user->password = bcrypt($data['password']);
    		$user->dobirth = $data['dobirth'];
    		$user->gender = $data['gender'];
    		$user->latitude = '';
    		$user->longitude = '';
			//echo "<pre>"; print_r($data); die;
    		$user->save();
    		return redirect('/');
    	}
    	
    	return view('users.register');
    }
}
