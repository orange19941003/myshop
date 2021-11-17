<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Controllers\admin\Base;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class LoginController extends Base
{
    public function get()
    {
    	return view('admin/login/index', $this->data);
    }

    public function post()
    {
    	$data = input();
    	if ($this->validator($data)->fails())
    	{
    		// return $this->error('验证码错误');
    	}
    	$name = input('name');
    	$password = input('pwd');
    	$o_admin = Admin::where('name', $name)
    		->where('status', 1)
    		->first();
    	if (!$o_admin)
    	{
    		return $this->error('用户名不存在');
    	}
    	if (date("Y-m-d H:i:s") < $o_admin->locktime)
		{

			return $this->error("密码错误5次，封禁至" . $o_admin->locktime);
		}
    	$error_pwd = session('error_pwd', 0);
    	if ($o_admin->pwd != md5($password . config('app.pwd_salt')))
    	{
    		session(['error_pwd' => $error_pwd + 1]);

    		return $this->error('密码错误');
    	}
    	if ($error_pwd >= 5)
		{
			$o_admin->locktime = date("Y-m-d H:i:s", time() + 10*60);
			$o_admin->save();

			return $this->error("密码错误5次，封禁10分钟");
		}
    	$id = $o_admin->id;
    	//redis锁单点登录,300秒
    	if (Redis::set("admin_lock_{$id}", '', "nx", "ex", 300))
    	{

    		session(['admin_id' => $o_admin->id, 'error_pwd' => 0]);
    	}
    	else
    	{
    		// Redis::del("my:lock")
    		return $this->error('账号已登录或者在其他设备已登录');
    	}

    	return $this->success('登录成功');
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
            'captcha' => ['required', 'captcha'],
        ]);
    }

    //退出系统
    public function out()
    {
    	Redis::del("admin_lock_".session('admin_id'));
    	session(['admin_id' => null]);

    	return redirect('admin/login');
    }
}
