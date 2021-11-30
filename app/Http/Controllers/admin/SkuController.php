<?php
/*
 *后台用户管理
 */

namespace App\Http\Controllers\admin;

use App\Cate;
use App\Sku;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Base;

class SkuController extends Base
{
    public function index()
    {
        $cates = Cate::getAll();
        $this->data['cates'] = $cates;

    	return view('admin/Sku/index', $this->data);
    }

    public function list()
    {
    	$page = input('page');
    	$limit = input('limit');
    	$name = input('name', '');
        $cate_id = input('cate_id', 0);
        $is_hot = input('is_hot', -1);
    	$SkuModel = new Sku; 
    	$data = $SkuModel->getSkuList($limit, $name, $cate_id, $is_hot);
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
        $cates = Cate::getAll();
        $this->data['cates'] = $cates;

    	return view('admin/Sku/add', $this->data);
    }

    public function addPost()
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('商品名不能为空');
        }
        $cate_id = input('cate_id', 0);
        if (!$cate_id)
        {
            return $this->error('请选择商品分类');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $SkuModel = new Sku;
        if ($SkuModel->where('name', $name)->where('status', 1)->exists())
        {
            return $this->error("商品名重复");
        }
        $is_hot = input('is_hot', 0);
        if (!in_array($is_hot, [0,1]))
        {
            return $this->error('推荐参数错误');
        }
        $res = $SkuModel->add($name, $cate_id, $is_hot, $weight);
        if (!$res)
        {
        	return $this->error("新增失败");
        }

        return $this->success('新增成功');
    }

    public function edit($id)
    {
    	$SkuModel = new Sku;
        $Sku = $SkuModel->getSkuInfo($id);
        if (!$Sku)
        {
        	return $this->error("无效的id");
        }
        $this->data['Sku'] = $Sku;
        $cates = Cate::getAll();
        $this->data['cates'] = $cates;

        return view('admin/Sku/edit', $this->data);
    }

    public function editPost($id)
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('商品名不能为空');
        }
        $cate_id = input('cate_id', 0);
        if (!$cate_id)
        {
            return $this->error('请选择商品分类');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $SkuModel = new Sku;
        if ($SkuModel->where('name', $name)->where('id', '!=', $id)->where('status', 1)->exists())
        {
            return $this->error("商品名重复");
        }
        $is_hot = input('is_hot', 0);
        if (!in_array($is_hot, [0,1]))
        {
            return $this->error('推荐参数错误');
        }
        $res = $SkuModel->edit($id, $name, $cate_id, $is_hot, $weight);
        if (!$res)
        {
        	return $this->error("修改失败");
        }

        return $this->success('修改成功');
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$SkuModel = new Sku;
        $res = $SkuModel->del($ids);
        if (!$res)
        {
        	return $this->error("删除失败");
        }

        return $this->success('删除成功');	
    }

    public function changeStatus($id)
    {
        $SkuModel = new Sku;
        $res = $SkuModel->changeStatus($id);
        if (!$res)
        {
            return $this->error("操作失败");
        }
        if ($res === -1)
        {
            return $this->error("商品还没有添加sku");
        }
        if ($res === -2)
        {
            return $this->error("商品还没有添加图片");
        }

        return $this->success('操作成功');  
    }
}