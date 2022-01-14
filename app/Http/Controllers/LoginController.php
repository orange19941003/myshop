<?php

namespace App\Http\Controllers;

use App\Service\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function get(Request $request)
    {
    	$this->data['pwd'] = $request->cookie('pwd', '');
    	$this->data['name'] = $request->cookie('name', '');
    	$this->data['rememberMe'] = $request->cookie('rememberMe', '');

        return view('login', $this->data);
    }

	public function post()
    {
    	$name = input('name', '');
    	$pwd = input('pwd', '');
    	$User = new User;
    	$res = $User->login($name, $pwd);
    	if ($res['code'] != 2000)
    	{
    		return $res;
    	}
    	$user_id = $res['data']['user_id'];
    	$name = $res['data']['name'];
    	session(['name' => $name, 'user_id' => $user_id]);
    	if ($rememberMe = input('rememberMe') == "true")
    	{
    		return response($this->success('登录成功'))
    			->cookie('name', $name, 24*60*10)
				->cookie('pwd', $pwd, 24*60*10)
				->cookie('rememberMe', $rememberMe, 24*60*10);
    	}
    	Cookie::queue(Cookie::forget('name'));
    	Cookie::queue(Cookie::forget('pwd'));
    	Cookie::queue(Cookie::forget('rememberMe'));

    	return response($this->success('登录成功'));
    }    
}
