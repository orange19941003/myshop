<?php

namespace App\Service;

use App\Service\Base;
use App\User as UserModel;
use App\Http\Enums\IndexEnum;
use Illuminate\Support\Facades\Redis;

class User extends Base
{
	//注册
	public function register($name, $pwd_one, $email)
	{
		$UserModel = new UserModel;
		if ($UserModel->where('name', $name)->where('status', 1)->exists())
        {
            return $this->error("用户名重复");
        }
		$res = $UserModel->add(trim($name), $pwd_one, trim($email));
        if (!$res)
        {
         	return $this->error('系统错误，请稍后再试');
        }

        return $this->success('注册成功');
	}

	//修改密码
	public function editPwd($pwd, $email)
	{
		$UserModel = UserModel::where('email', $email)
			->where('status', 1)
			->first();
		if (!$UserModel)
        {
            return $this->error("用户不存在");
        }
        if ($UserModel->password == md5($pwd . config('app.pwd_salt')))
        {
        	return $this->error('密码为原来的');
        }
		$res = $UserModel->edit($UserModel->id, $UserModel->name, $pwd);
        if (!$res)
        {
         	return $this->error('系统错误，请稍后再试');
        }

        return $this->success('密码重置成功');
	}

	//登录
	public function login($name, $pwd)
	{
		$o_user = UserModel::where('name', $name)
			->orwhere('email', $name)
			->where('status', 1)
			->first();
    	if (!$o_user)
    	{
    		return $this->error(IndexEnum::LOGIN_NAME_ERROR);
    	}
    	if ($o_user->password != md5($pwd . config('app.pwd_salt')))
    	{

    		return $this->error(IndexEnum::LOGIN_PWD_ERROR);
    	}
        $id = $o_user->id;
    	//redis锁单点登录,3000秒
    	if (!Redis::set("index_user_lock_{$id}", '', "nx", "ex", 3000))
    	{
    		// Redis::del("my:lock");
    		return $this->error(IndexEnum::LOGIN_OTHER);
    	}
    	$data = [];
    	$data['user_id'] = $id;
    	$data['name'] = $name;

    	return $this->success(IndexEnum::LOGIN_SUCCESS, $data);
	}
}
