<?php
/*
 *商品图片管理
 */

namespace App\Http\Controllers\admin;

use App\Cate;
use App\Product;
use App\ProductImg;
use Illuminate\Http\Request;
use App\Http\Enums\admin\AdminEnum;
use App\Http\Controllers\admin\Base;

class ProductImgController extends Base
{
    public function index()
    {
        $products = Product::getAll();
        $this->data['products'] = $products;

        return view('admin/product_img/index', $this->data);
    }

    public function list()
    {
        $page = input('page');
        $limit = input('limit');
        $product_id = input('product_id', 0);
        $ProductImgModel = new ProductImg; 
        $data = $ProductImgModel->getProductImgList($limit, $product_id);
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

    public function add($product_id)
    {
        $this->data['product_id'] = $product_id;

        return view('admin/product_img/add', $this->data);
    }

    public function addPost($product_id)
    {
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $url = input('url', '');
        if ($url == '')
        {
            return $this->error('请上传图片');
        }
        if (!Product::where('status', '!=', 0)->find($product_id))
        {
            return $this->error("商品不存在");
        }
        $url = explode('|', $url);
        $ProductImgModel = new ProductImg;
        $res = $ProductImgModel->add($product_id, $url, $weight);
        if (!$res)
        {
            return $this->error(AdminEnum::ADD_ERROR);
        }

        return $this->success(AdminEnum::ADD_SUCCESS);
    }

    public function edit($id)
    {
        $ProductImgModel = new ProductImg;
        $ProductImg = $ProductImgModel->getProductImgInfo($id);
        if (!$ProductImg)
        {
            return $this->error("无效的id");
        }
        $this->data['ProductImg'] = $ProductImg;

        return view('admin/product_img/edit', $this->data);
    }

    public function editPost($id)
    {
        $weight = input('weight', 100);
        if ($weight < 0 || $weight >= 10000)
        {
            return $this->error('权重值错误');
        }
        $url = input('url', '');
        if ($url == '')
        {
            return $this->error('请上传图片');
        }
        $ProductImgModel = new ProductImg;
        $res = $ProductImgModel->edit($id, $url, $weight);
        if (!$res)
        {
            return $this->error(AdminEnum::EDIT_ERROR);
        }

        return $this->success(AdminEnum::EDIT_SUCCESS);
    }

    public function del($ids)
    {
        $ids = explode('|', $ids);
        $ProductImgModel = new ProductImg;
        $res = $ProductImgModel->del($ids);
        if (!$res)
        {
            return $this->error(AdminEnum::DELETE_ERROR);
        }

        return $this->success(AdminEnum::DELETE_SUCCESS);   
    }
}
