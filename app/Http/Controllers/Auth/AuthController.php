<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';
    
    protected $redirectAfterLogout = '/index';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        	'id' => 'sometimes',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'head_img' => 'sometimes',             
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {	
    	if(!array_key_exists('head_img', $data)){
    		$data['head_img'] = '../home/img/head_img/default_head_img.png';	
    	}
  
    	if(array_key_exists('anony_remember_token', $_COOKIE)){
	    				
	    	$cookie = $_COOKIE['anony_remember_token'];				
			$user = User::where('remember_token', $cookie)->first();
    		
	    	if($user){
	    		if($user->is_anony){
	    			//防止被恶意篡改				    			
		    			$user->name = $data['name'];
		    			$user->email = $data['email'];
		    			$user->is_anony = 0;
		    			$user->password = bcrypt($data['password']);
		    			$user->head_img = $data['head_img'];
		    			$user->save();
		    			return $user;
	    		}
	    	}
	    }	
    	
    	
    	$uuid = md5(time() . mt_rand(1,1000000));
        return User::create([
        	'id' => mt_rand(1,100000000),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'head_img' => $data['head_img'],
        ]);
    }
}
