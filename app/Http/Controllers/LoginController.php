<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login.login');
    }

         public function verify(Request $req){

    	$validation = Validator::make($req->all(), [
    	 	'email' => 'required',
    		'password' => 'required|min:4'
		]);

    	if ($validation->fails())
    	{
    		return redirect()->route('login')->withErrors($validation)->withInput();
    	}
    	else{

        	 //$user = User::where(['email'=>$req->email,'password'=>$req->password])->first();
			 $user = DB::table('users')
			 ->where('email', $req->email)
			 ->where('password', $req->password)
			 ->first();	
			  $req->session()->put('name', $user->name);
				$req->session()->put('email', $user->email);
				$req->session()->put('uid',$user->uid);

            if (count((array)$user) > 0) 
            {
            	
            	if(strtolower($user->role) == 'admin'){
					$req->session()->put('user', $user);
					$req->session()->put('email', $user->email);
            		return redirect()->route('admin.index');
            	}

            	else if(strtolower($user->role) == 'manager'){
                	return redirect()->route('home.index');
            	}
            
        	}
        	else{
    			$req->session()->flash('msg', 'Invalid Username/Password');
    			return redirect()->route('login');
    		}
    	}	
    }
    public function logout(Request $req){
        $req->session()->flush();
    	return redirect()->route('login');
    }

    }

