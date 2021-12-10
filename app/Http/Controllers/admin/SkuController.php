<?php
/*
 *sku管理
 */

namespace App\Http\Controllers\admin;

use App\Sku;
use App\Cate;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Enums\admin\AdminEnum;
use App\Http\Controllers\admin\Base;

class SkuController extends Base
{
    public function index()
    {
        $Products = Product::getAll();
        $this->data['Products'] = $Products;

    	return view('admin/Sku/index', $this->data);
    }

    public function list()
    {
    	$page = input('page');
    	$limit = input('limit');
    	$name = input('name', '');
        $product_id = input('product_id', 0);
    	$SkuModel = new Sku; 
    	$data = $SkuModel->getSkuList($limit, $name, $product_id);
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
        $Products = Product::getAll();
        $this->data['Products'] = $Products;

    	return view('admin/sku/add', $this->data);
    }

    public function addPost()
    {
    	$name = input('name', '');
        if (empty($name))
        {
        	return $this->error('商品名不能为空');
        }
        $product_id = input('product_id', 0);
        if (!$product_id)
        {
            return $this->error('请选择所属商品');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $num = input('num', 0);
        if (!checkInt($num, 1))
        {
            return $this->error("请输入正确的库存数量");
        }
        $cost = input('cost', 0);
        if (!checkInt($cost * 100, 1))
        {
            return $this->error("请输入正确的上游成本");
        }
        $price = input('price', 0);
        if (!checkInt($price * 100, 1))
        {
            return $this->error("请输入正确的售价");
        }
        $Product = new Product;
        if (!$Product->getProductInfo($product_id))
        {
            return $this->error("商品不存在");
        }
        $SkuModel = new Sku;
        if ($SkuModel->where('name', $name)->where('product_id', $product_id)->where('status', 1)->exists())
        {
            return $this->error("属性重复");
        }
        $res = $SkuModel->add($name, $product_id, $cost * 100, $weight, $price * 100, $num);
        if (!$res)
        {
            return $this->error(AdminEnum::ADD_ERROR);
        }

        return $this->success(AdminEnum::ADD_SUCCESS);
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
        $Products = Product::getAll();
        $this->data['Products'] = $Products;

        return view('admin/Sku/edit', $this->data);
    }

    public function editPost($id)
    {
    	$name = input('name', '');
        if (empty($name))
        {
            return $this->error('商品名不能为空');
        }
        $product_id = input('product_id', 0);
        if (!$product_id)
        {
            return $this->error('请选择所属商品');
        }
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $num = input('num', 0);
        if (!checkInt($num, 1))
        {
            return $this->error("请输入正确的库存数量");
        }
        $cost = input('cost', 0);
        if (!checkInt($cost * 100, 1))
        {
            return $this->error("请输入正确的上游成本");
        }
        $price = input('price', 0);
        if (!checkInt($price * 100, 1))
        {
            return $this->error("请输入正确的售价");
        }
        $Product = new Product;
        if (!$Product->getProductInfo($product_id))
        {
            return $this->error("商品不存在");
        }
        $SkuModel = new Sku;
        if ($SkuModel->where('name', $name)->where('id', '!=', $id)->where('product_id', $product_id)->where('status', 1)->exists())
        {
            return $this->error("商品名重复");
        }
        $res = $SkuModel->edit($id, $name, $product_id, $cost * 100, $weight, $price * 100, $num);
        if (!$res)
        {
            return $this->error(AdminEnum::EDIT_ERROR);
        }

        return $this->success(AdminEnum::EDIT_SUCCESS);
    }

    public function del($ids)
    {
    	$ids = explode('|', $ids);
    	$SkuModel = new Sku;
        $res = $SkuModel->del($ids);
        if (!$res)
        {
            return $this->error(AdminEnum::DELETE_ERROR);
        }

        return $this->success(AdminEnum::DELETE_SUCCESS);	
    }

    public function changeStatus($id)
    {
        $SkuModel = new Sku;
        $res = $SkuModel->changeStatus($id);
        if (!$res)
        {
            return $this->error("操作失败");
        }

        return $this->success('操作成功');  
    }
}
