<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Jobs\testJob;
use App\Http\Enums\admin\AdminEnum;
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
    		return $this->error(AdminEnum::LOGIN_CODE_ERROR);
    	}
    	$name = input('name');
    	$password = input('pwd');
    	$o_admin = Admin::where('name', $name)
    		->where('status', 1)
    		->first();
    	if (!$o_admin)
    	{
    		return $this->error(AdminEnum::LOGIN_NAME_ERROR);
    	}
    	if (date("Y-m-d H:i:s") < $o_admin->locktime)
		{

			return $this->error(AdminEnum::LOGIN_PWD_FIVE_ERROR . $o_admin->locktime);
		}
    	$error_pwd = session('error_pwd', 0);
    	if ($o_admin->pwd != md5($password . config('app.pwd_salt')))
    	{
    		session(['error_pwd' => $error_pwd + 1]);

    		return $this->error(AdminEnum::LOGIN_PWD_ERROR);
    	}
    	if ($error_pwd >= 5)
		{
			$o_admin->locktime = date("Y-m-d H:i:s", time() + 10*60);
			$o_admin->save();

			return $this->error(AdminEnum::LOGIN_PWD_FIVE_ERROR . $o_admin->locktime);
		}
        $id = $o_admin->id;
    	//redis锁单点登录,3000秒
    	if (Redis::set("admin_lock_{$id}", '', "nx", "ex", 3000))
    	{

    		session(['admin_id' => $id, 'error_pwd' => 0, 'admin_name' => $o_admin->name]);
    	}
    	else
    	{
    		// Redis::del("my:lock")
    		return $this->error(AdminEnum::LOGIN_OTHER);
    	}
    	testJob::dispatch($name . '在' . date("Y-m-d H:i:s") . "登录了系统");

    	return $this->success(AdminEnum::LOGIN_SUCCESS);
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
