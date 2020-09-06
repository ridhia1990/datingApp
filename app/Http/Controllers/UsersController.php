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
				$thumbnailImage->resize(255,255);
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

            $user->save();
    		return redirect('/'); 
        }
    		
    	return view('users.register');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
              
                    Session::put('frontSession',Auth::User()->name);
                    return redirect('/profile');                
            }else{
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

    		$currentUser 	= Auth::user();
    		$latitude 		=  $currentUser->latitude;
    		$longitude 		=  $currentUser->longitude;
    		$matchedUsers  	= User::whereRaw("( 6371 * acos ( cos ( radians(".$latitude.") ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(".$longitude.") ) + sin ( radians(".$latitude.") ) * sin( radians( latitude ) ) ) <= 5)")->where('id','!=',$currentUser->id)->get();
    		
    		return view('users.matchedUsers',array('matchedUsers' => $matchedUsers));
    }

    
}
