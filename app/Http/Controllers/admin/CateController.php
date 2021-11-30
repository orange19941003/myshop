<?php
/*
 *后台用户管理
 */

namespace App\Http\Controllers\admin;

use App\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Base;

class CateController extends Base
{
    public function index()
    {
    	return view('admin/cate/index', $this->data);
    }

    public function list()
    {
    	$page = input('page');
    	$limit = input('limit');
    	$name = input('name', '');
    	$cateModel = new Cate; 
    	$data = $cateModel->getCateList($limit, $name);
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

    	return view('admin/cate/add', $this->data);
    }

    public function addPost()
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('分类名不能为空');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $cateModel = new Cate;
        if ($cateModel->where('name', $name)->where('status', 1)->exists())
        {
            return $this->error("分类名重复");
        }
        $res = $cateModel->add($name, $weight);
        if (!$res)
        {
        	return $this->error("新增失败");
        }

        return $this->success('新增成功');
    }

    public function edit($id)
    {
    	$cateModel = new Cate;
        $cate = $cateModel->getCateInfo($id);
        if (!$cate)
        {
        	return $this->error("无效的id");
        }
        $this->data['cate'] = $cate;

        return view('admin/cate/edit', $this->data);
    }

    public function editPost($id)
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('分类名不能为空');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $cateModel = new Cate;
        if ($cateModel->where('name', $name)->where('id', '!=', $id)->where('status', 1)->exists())
        {
            return $this->error("分类名重复");
        }
        $res = $cateModel->edit($id, $name, $weight);
        if (!$res)
        {
        	return $this->error("修改失败");
        }

        return $this->success('修改成功');
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$cateModel = new Cate;
        $res = $cateModel->del($ids);
        if (!$res)
        {
        	return $this->error("删除失败");
        }

        return $this->success('删除成功');	
    }
}
