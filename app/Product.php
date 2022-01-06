<?php
namespace App;

use App\Sku;
use App\ProductImg;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getAll()
    {
        return self::where('status', '!=', 0)->get();
    }

    public function getProductList($limit, $name, $cate_id, $is_hot)
    {
        $s_name_eq = $name != '' ? 'like' : '!='; 
        $s_cate_id_eq = $cate_id != 0 ? '=' : '!=';
        $s_is_hot_eq = $is_hot != -1 ? '=' : '!=';
        $data = self::from('products as a')
            ->leftJoin('cates as b', 'a.cate_id', '=', 'b.id')
            ->leftJoin('admins as c', 'a.uid', '=', 'c.id')
            ->where('a.status', '!=', 0)
            ->where('a.cate_id', $s_cate_id_eq, $cate_id)
            ->where('a.is_hot', $s_is_hot_eq, $is_hot)
            ->where('a.name', $s_name_eq, "%" . $name . "%")
            ->select('a.*', 'b.name as cate_name', 'c.name as admin_name')
            ->orderBy('a.weight', 'desc')
            ->orderBy('a.add_time', 'desc')
            ->paginate($limit);

        return $data;
    }

    /*
     *新增商品
     */
    public function add($name, $cate_id, $is_hot, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->add_time = date("Y-m-d H:i:s");
        $this->edit_time = date("Y-m-d H:i:s");
        $this->uid = session('admin_id', 1);
        $this->cate_id = $cate_id;
        $this->is_hot = $is_hot;
        $res = $this->save();

        return $res;
    }

    /*
     *删除商品
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

    /*
     *商品上架下架
     */
    public function changeStatus($id)
    {
        $product = self::where('status', '!=', 0)
            ->find($id);
        if (!$product)
        {
            return false;
        }
        if ($product->status == 2)
        {
            //上架检查是否有商品图片和sku
            if (!Sku::where('product_id', $id)->where('status', 1)->first())
            {
                return -1;
            }
            if (!ProductImg::where('product_id', $id)->where('status', 1)->first())
            {
                return -2;
            }
            $product->status = 1;
        }
        else {
            $product->status = 2;
        }
        $sku->edit_time = date("Y-m-d H:i:s");
        $sku->uid = session('admin_id', 0);
        $res = $product->save();

        return $res;
    }

    //根据id获取商品信息
    public function getProductInfo($id)
    {
        $Admin = self::where('status', '!=', 0)
            ->find($id);

        return $Admin;
    }

    /*
     *修改商品信息
     */
    public function edit($id, $name, $cate_id, $is_hot, $weight)
    {
        $data = [
            'weight' => $weight,
            'name' => $name,
            'edit_time' => date("Y-m-d H:i:s"), 
            'uid' => session('admin_id', 1),
            'cate_id' => $cate_id,
            'is_hot' => $is_hot
        ];
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
