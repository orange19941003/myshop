<?php

namespace App\Http\Controllers;

use App\Mail\Code;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', $this->data);
    }

    public function sendCode()
    {
    	$email = trim(input('email'));
    	if (!checkEmail(trim($email)))
    	{
    		return $this->error('邮箱格式错误');
    	}
    	$code = rand('100000', '999999');
    	try {
            Mail::to($email)->send(new Code($code));
        } catch (\Error $error) {
        
         	return $this->error('邮件发送失败');
        }
        session(['email_code' => $code]);

        return $this->success('发送成功');
    }
}
