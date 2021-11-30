<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Base extends Controller
{
	public $data;
    protected $admin_id;
  	
  	public function __construct(Request $request)
  	{
        $this->data = [];
        $this->middleware(function ($request, $next) {
            $this->admin_id = $request->session()->get('admin_id', []);
            if ($request->route()->uri != 'admin/login' && $request->getMethod() == 'GET' && $this->admin_id)
            {
                $aid = $request->input('aid', 0);
                $paid = $request->input('paid', 0);
                $auths = Auth::getAdminAuth($this->admin_id);
                $this->data['aid'] = $aid;
                $this->data['paid'] = $paid;
                $this->data['TagOne'] = Auth::getAuthById($paid);
                $this->data['TagTwo'] = Auth::getAuthById($aid);
                $this->data['auths'] = $this->AuthOrder($auths);
            }

            return $next($request);
        });
        
  	}

  	/*
  	 *权限分类
  	 *
  	 */
  	protected function AuthOrder($auth)
  	{
  		$auths = [];
  		foreach ($auth as $key => $value) {
			if ($value->grade == 1)
			{
				$auths[1][] = $value;
			}
  		}
  		foreach ($auth as $key => $value) {
  			if ($value->grade == 2)
  			{
  				$auths[2][] = $value;
  			}
  		}

  		return $auths;
  	}

    /**
     *获得权限树形数据
     *  
     */
    protected function getAuthTree($auths, $role_id=0)
    {
        //获取角色的所有权限
        $self_auths = Role::getRoleAthus($role_id);
        $treeAuths = [];
        foreach ($auths[1] as $key => $value) {
            $treeAuth = [];
            $treeAuth['title'] = $value->name;
            $treeAuth['id'] = $value->id;
            foreach ($auths[2] as $key1 => $val) {
                if ($val->pid == $value->id)
                {
                    $treeAuthTwo = [];
                    $treeAuthTwo['id'] = $val->id;
                    $treeAuthTwo['title'] = $val->name;
                    $treeAuthTwo['checked'] = in_array($val->id, $self_auths) ? true : false;
                    $treeAuthTwo['spread'] = true;
                    $treeAuth['children'][] = $treeAuthTwo;
                }
            }
            $treeAuth['spread'] = true;
            $treeAuths[] = $treeAuth; 
        }
        return $treeAuths;
    }

  	/*
  	 *统一失败函数
  	 */
  	protected function error(string $msg)
  	{
  		$arr = [];
  		$arr['code'] = 401;
  		$arr['msg'] = $msg;

  		return $arr; 
  	}

  	/*
  	 *统一成功函数
  	 */
  	protected function success(string $msg)
  	{
  		$arr = [];
  		$arr['code'] = 200;
  		$arr['msg'] = $msg;

  		return $arr; 
  	}
}
