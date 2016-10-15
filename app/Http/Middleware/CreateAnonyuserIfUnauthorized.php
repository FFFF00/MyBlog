<?php

namespace App\Http\Middleware;

use Closure;
use Redis;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Anonyuser;
use App\Tag;
use App\User;
use App\Ip;

class CreateAnonyuserIfUnauthorized
{    
    public function handle($request, Closure $next)
    {	
        if (!Auth::check()) {
        	if(!$request->session()->get('anony_user')){
	        	//remember_token不存在，直接创建
	            if(!array_key_exists('anony_remember_token', $_COOKIE)){
	            	$user = $this->_anonyuserByIp($request);
				}else{
					$cookie = $_COOKIE['anony_remember_token'];				
					$user = User::where('remember_token', $cookie)->first();
					if(!$user){
						$user = $this->_anonyuserByIp($request);
					}
				}
				$request->session()->put('anony_user', $user);
        	}			
        }     
        		
        return $next($request);
    }
    
    private function _realip() {
	    if (getenv('HTTP_CLIENT_IP')){
	        $ip = getenv('HTTP_CLIENT_IP');
	    } elseif (getenv('HTTP_X_FORWARDED_FOR')){
	        $ip = getenv('HTTP_X_FORWARDED_FOR');
	    } elseif (getenv('REMOTE_ADDR')){
	        $ip = getenv('REMOTE_ADDR');
	    } else{
	        $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
	    }
	    return $ip;
	} 
	
	private function _anonyuserByIp(Request $request){
		$realip = $this->_realip();
		$ip = Ip::where('ip', $realip)->first();
		
		if($ip){
			//do nothiing now
		}else{
			$ip_args = [
				'ip_id' => $req->input('ip_id'),
				'ip' => $realip,
			];
			$ip = Ip::create($ip_args);
		}
		
		$anonyuser = $ip->user;
		$uuid = md5(time() . mt_rand(1,1000000));
		
		if(!$anonyuser){
			$anonyuser_args = [
				'id' => $uuid,
				'name' => $this->_randRGB(),
				'is_anony' => 1,
				'email' => $uuid,
				'ip_id' => $ip->ip_id,
			];
			$anonyuser = User::create($anonyuser_args);
		}
		//设置token
		
		$anonyuser->remember_token = $uuid;
		$anonyuser->save();
		setcookie('anony_remember_token', $uuid, time()+3600*24*30);
				
		return $anonyuser;
	}
	
	function _randRGB(){  
		$str = '0123456789ABCDEF';  
	    $len = strlen($str);  
	    //只有我能叫#FFFF00
	    do{
		    $RGB = '#';
		    for($i = 1; $i <= 6; $i++){  
		        $num = rand(0, $len-1);    
		        $RGB = $RGB.$str[$num];   
		    }  
	    }while($RGB == '#FFFF00');
	    
	    return $RGB;  
	}
}
