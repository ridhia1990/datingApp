<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;


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

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //echo "<pre>"; print_r($data); die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                /*echo "success"; die;*/
				//$user_id = Auth::User()->id;
            // echo "<pre>"; print_r(Auth::User()); die;
                    Session::put('frontSession',Auth::User()->name);
                    return redirect('/profile');
                
            }else{
                /*echo "failed"; die;*/
                return redirect::back()->with('flash_message_error','Invalid Username or Password');
            }
        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('current_url');
        return redirect()->action('IndexController@index');
    }

    public function profile(){

        // Check if dating profile already exists and under review
       	
        return view('users.profile',array('userProfile' => Auth::user()));
    }

    public function viewProfile($username){
        $userCount = User::where('username',$username)->count();
        if($userCount>0){
            $userDetails = User::with('details')->with('photos')->where('username',$username)->first();
            $userDetails = json_decode(json_encode($userDetails));
            /*echo "<pre>"; print_r($userDetails); die;*/
        }else{
            abort(404);    
        } 
        return view('users.profile')->with(compact('userDetails'));
    }
}
