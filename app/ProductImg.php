<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getAll()
    {
        return self::where('status', 1)->get();
    }

    public function getProductImgList($limit, $product_id)
    {
        $s_product_id_eq = $product_id != 0 ? '=' : '!='; 
        $data = self::from('product_imgs as a')
            ->leftJoin('products as b', 'a.product_id', '=', 'b.id')
            ->leftJoin('admins as c', 'a.uid', '=', 'c.id')
            ->where('a.status', 1)
            ->where('a.product_id', $s_product_id_eq, $product_id)
            ->select('a.*', 'b.name as name', 'c.name as admin_name')
            ->orderBy('a.weight', 'desc')
            ->orderBy('a.add_time', 'desc')
            ->paginate($limit);

        return $data;
    }

    /*
     *新增图片
     */
    public function add($product_id, $img_urls, $weight)
    {
        foreach ($img_urls as $key => $img_url) {
            $ProductImg = new self;
            $ProductImg->product_id = $product_id;
            $ProductImg->add_time = date("Y-m-d H:i:s");
            $ProductImg->edit_time = date("Y-m-d H:i:s");
            $ProductImg->uid = session('admin_id', 1);
            $ProductImg->img_url = $img_url;
            $ProductImg->weight = $weight;
            $res = $ProductImg->save();
        }

        return $res;
    }

    /*
     *删除管理员
     */
    public function del($id)
    {
        $res = self::whereIn('id', $id)
            ->update([
                'status' => 0, 
                'edit_time' => date("Y-m-d H:i:s"), 
                'uid' => session('admin_id', 1),
            ]);

        return $res;
    }    

    //根据id获取管理员信息
    public function getProductImgInfo($id)
    {
        $ProductImg = self::where('status', 1)
            ->find($id);

        return $ProductImg;
    }

    /*
     *修改管理员信息
     */
    public function edit($id, $img_url, $weight)
    {
        $data = [
            'edit_time' => date("Y-m-d H:i:s"), 
            'uid' => session('admin_id', 1),
            'img_url' => $img_url
        ];
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
