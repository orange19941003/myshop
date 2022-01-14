<?php

namespace App\Http\Controllers;

use App\Service\User;
use App\Http\Enums\IndexEnum;
use App\Http\Controllers\Controller;

class ForgetPwdController extends Controller
{
    public function get()
    {
        return view('forgetPwd', $this->data);
    }

	public function post()
    {
    	$pwd_one = input('pwd_one', '');
    	$pwd_two = input('pwd_two', '');
    	$email = input('email', '');
    	$code = input('code', '');
    	if ($code != session('email_code'))
    	{
    		return $this->error(IndexEnum::LOGIN_CODE_ERROR);
    	}
    	if (!checkEmail(trim($email)))
    	{
    		return $this->error('邮箱格式错误');
    	}
    	if (!preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}/', $pwd_one) && $pwd_one != '')
        {
            return $this->error('密码必须同时含有数字、大小写字母，且长度要在8-16位之间');
        }
        if ($pwd_one !== $pwd_two)
        {
        	return $this->error('两次密码不同');	
        }
        $User = new User;
        $res = $User->editPwd($pwd_one, $email);

        return $res;
    }
}
