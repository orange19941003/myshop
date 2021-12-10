<?php
/*
 *后台用户管理
 */
namespace App\Http\Controllers\admin;

use App\Auth;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Enums\admin\AdminEnum;
use App\Http\Controllers\admin\Base;

class RoleController extends Base
{
    public function index()
    {
    	return view('admin/role/index', $this->data);
    }

    public function list()
    {
    	$page = input('page');
    	$limit = input('limit');
    	$name = input('name', '');
    	$roleModel = new role; 
    	$data = $roleModel->getRoleList($limit, $name);
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

        $treeAuths = $this->getAuthTree($this->AuthOrder(Auth::getAll()));
        $this->data['treeAuths'] = json_encode($treeAuths);

    	return view('admin/role/add', $this->data);
    }

    public function addPost()
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('角色名不能为空');
        }
        $id = input('id', '');
        $id = json_encode(explode(',', $id));
        $roleModel = new Role;
        $res = $roleModel->add($name, $id);
        if (!$res)
        {
            return $this->error(AdminEnum::ADD_ERROR);
        }

        return $this->success(AdminEnum::ADD_SUCCESS);
    }

    public function edit($id)
    {
    	$roleModel = new Role;
        $role = $roleModel->getRoleInfo($id);
        if (!$role)
        {
        	return $this->error("无效的id");
        }
        $this->data['role'] = $role;
        $treeAuths = $this->getAuthTree($this->AuthOrder(Auth::getAll()), $id);
        $this->data['treeAuths'] = json_encode($treeAuths);

        return view('admin/role/edit', $this->data);
    }

    public function editPost($id)
    {
    	$name = input('name', '');
        $auth_json = json_encode(explode(',', input('ids', '')));
        if (empty($name))
        {
        	return $this->error('用户名不能为空');
        }
        $roleModel = new Role;
        // DB::enableQueryLog();
        $res = $roleModel->edit($id, $name, $auth_json);
        // dd(DB::getQueryLog());
        if (!$res)
        {
            return $this->error(AdminEnum::EDIT_ERROR);
        }

        return $this->success(AdminEnum::EDIT_SUCCESS);
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$roleModel = new Role;
        $res = $roleModel->del($ids);
        if (!$res)
        {
            return $this->error(AdminEnum::DELETE_ERROR);
        }

        return $this->success(AdminEnum::DELETE_SUCCESS);	
    }
}
