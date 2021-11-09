<?php
/*
 *后台用户管理
 */

namespace App\Http\Controllers\admin;

use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Base;

class AdminController extends Base
{
    public function index()
    {
    	return view('admin/admin/index', $this->data);
    }

    public function list()
    {
    	$page = input('page');
    	$limit = input('limit');
    	$name = input('name', '');
    	$adminModel = new Admin; 
    	$data = $adminModel->getAdminList($limit, $name);
    	$data = $data->toArray();
    	$count = $data['total'] ? $data['total'] : 0;
    	$data = $data['data'] ? $data['data'] : [];
    	$return = [];
    	$return['count'] = $count;
    	$return['data'] = $data;
    	$return['msg'] = '';
    	$return['code'] = 0;

    	return $return;
    }

    public function add()
    {
        $roles = Role::getAll();
        $this->data['roles'] = $roles;

    	return view('admin/admin/add', $this->data);
    }

    public function addPost()
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('用户名不能为空');
        }
        $roles = input('roles', '');
        $fuc_role = function ($roles) {
            if (json_decode($roles, true))
            {
                return $roles;
            }
            else
            {
                return '';
            }
        };
        $adminModel = new Admin;
        if ($adminModel->where('name', $name)->where('status', 1)->exists())
        {
            return $this->error("用户名重复");
        }
        $res = $adminModel->add($name, $fuc_role($roles));
        if (!$res)
        {
        	return $this->error("新增失败");
        }

        return $this->success('新增成功');
    }

    public function edit($id)
    {
    	$adminModel = new Admin;
        $admin = $adminModel->getAdminInfo($id);
        if (!$admin)
        {
        	return $this->error("无效的id");
        }
        $roles = Role::getAll();
        //用户的角色
        $a_role = json_decode($admin->role_json, true);
        $this->data['a_role'] = $a_role;
        $this->data['roles'] = $roles;
        $this->data['admin'] = $admin;

        return view('admin/admin/edit', $this->data);
    }

    public function editPost($id)
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('用户名不能为空');
        }
        $roles = input('roles', '');
        $fuc_role = function ($roles) {
            if (json_decode($roles, true))
            {
                return $roles;
            }
            else
            {
                return '';
            }
        };
        $adminModel = new Admin;
        if ($adminModel->where('name', $name)->where('status', 1)->exists())
        {
            return $this->error("用户名重复");
        }
        $res = $adminModel->edit($id, $name, $fuc_role($roles));
        if (!$res)
        {
        	return $this->error("修改失败");
        }

        return $this->success('修改成功');
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$adminModel = new Admin;
        $res = $adminModel->del($ids);
        if (!$res)
        {
        	return $this->error("删除失败");
        }

        return $this->success('删除成功');	
    }
}
