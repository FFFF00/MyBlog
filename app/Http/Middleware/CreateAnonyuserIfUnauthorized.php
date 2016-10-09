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
use App\Ip;

class CreateAnonyuserIfUnauthorized
{    
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            if(!empty($_COOKIE['anony_remember_token'])){
				$cookie = $_COOKIE['anony_remember_token'];				
				$user = Anonyuser::where('remember_token', $cookie)->first();
				if(!$user){
					$user = $this->_anonyuserByIp();
				}
			}else{
				$user = $this->_anonyuserByIp();
			}
			$request->session()->put($_COOKIE['anony_remember_token'],$user);
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
	
	private function _anonyuserByIp(){
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
		
		$anonyuser = $ip->anonyuser;
		
		if(!$anonyuser){
			$anonyuser_args = [
				'anonyuser_id' => null,
				'nickname' => $this->_randRGB(),
				'ip_id' => $ip->ip_id,
			];
			$anonyuser = Anonyuser::create($anonyuser_args);
		}
		//设置token
		$uuid = md5(time() . mt_rand(1,1000000));
		$anonyuser->remember_token = $uuid;
		$anonyuser->save();
		setcookie('anony_remember_token', $uuid);
		
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
