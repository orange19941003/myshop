<?php
/*
 *权限管理
 */

namespace App\Http\Controllers\admin;

use App\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Base;

class AuthController extends Base
{
    public function index()
    {
    	return view('admin/auth/index', $this->data);
    }

    public function list(Request $request)
    {
    	$page = $request->input('page');
    	$limit = $request->input('limit');
    	$name = $request->input('name', '');
    	$authModel = new Auth; 
    	$data = $authModel->getAuthList($limit, $name);
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
    	return view('admin/auth/add', $this->data);
    }

    public function addPost(Request $request)
    {
    	$name = $request->input('name', '');
        $url = $request->input('url') ? $request->input('url') : '';
        $grade = $request->input('grade', '');
        $pid = $request->input('pid', '');
        if (empty($name) || !in_array($grade, [1, 2, 3]))
        {
        	return $this->error('权限名或权限等级未填');
        }
        if ($grade == 1)
        {
        	$pid = 0;
        } 
        else
        {
        	if (empty($pid))
        	{
        		return $this->error('请选择父级权限');
        	}
        }
        $authModel = new Auth;
        $res = $authModel->add($name, $url, $grade, $pid);
        if (!$res)
        {
        	return $this->error("新增失败");
        }

        return $this->success('新增成功');
    }

    public function edit($id)
    {
    	$authModel = new Auth;
        $auth = $authModel->getAuthInfo($id);
        if (!$auth)
        {
        	return $this->error("无效的id");
        }
        $this->data['auth'] = $auth;

        return view('admin/auth/edit', $this->data);
    }

    public function editPost(Request $request,$id)
    {
    	$name = $request->input('name', '');
        $url = $request->input('url') ? $request->input('url') : '';
        $grade = $request->input('grade', '');
        $pid = $request->input('pid', '');
        if (empty($name) || !in_array($grade, [1, 2, 3]))
        {
        	return $this->error('权限名或权限等级未填');
        }
        if ($grade == 1)
        {
        	$pid = 0;
        } 
        else
        {
        	if (empty($pid))
        	{
        		return $this->error('请选择父级权限');
        	}
        }
        $authModel = new Auth;
        $res = $authModel->edit($id, $name, $url, $grade, $pid);
        if (!$res)
        {
        	return $this->error("修改失败");
        }

        return $this->success('修改成功');
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$authModel = new Auth;
        $res = $authModel->del($ids);
        if (!$res)
        {
        	return $this->error("删除失败");
        }

        return $this->success('删除成功');	
    }
}
