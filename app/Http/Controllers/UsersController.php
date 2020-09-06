<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use File;
use Image;
use Location;



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
    		$user->latitude = 0;
    		$user->longitude = 0;
			//echo "<pre>"; print_r($user); die;
			if($request->hasFile('photo')){
                $files 		= $request->file('photo');           
				$extension 	= $files->getClientOriginalExtension();
				// Give Random name to image and add its extension
				$fileName 			= rand(111,99999).'.'.$extension;
				$originalImage 		= $request->file('photo');
				$thumbnailImage 	= Image::make($originalImage);
				$thumbnailPath 		= public_path().'/images/frontend_images/photos/';
				//$originalPath = public_path().'/images/';
				//$thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
				$thumbnailImage->resize(600,600);
				$thumbnailImage->save($thumbnailPath.$fileName);
                
            }
			$user->photo = $fileName;

			//user location
			$clientIP = $request->ip();
			$location = \Location::get($clientIP);

			if($location){
				$user->latitude 	= $location->latitude;
    			$user->longitude 	= $location->longitude;
			}
			//dd($location);

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
        return redirect()->action('HomeController@index');
    }

    public function profile(){

    		return view('users.profile',array('userProfile' => Auth::user()));
    }

    public function matchedUsers(){

    		$matchedUsers  = array('' => '');
    		return view('users.matchedUsers',array('matchedUsers' => $matchedUsers));
    }

    
}
