<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
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

    public function getSkuList($limit, $name, $product_id)
    {
        $s_name_eq = $name != '' ? 'like' : '!=';
        $s_product_id_eq = $product_id ? '=' : '!='; 
        $data = self::from('skus as a')
            ->leftJoin('products as b', 'a.product_id', '=', 'b.id')
            ->leftJoin('admins as c', 'a.uid', '=', 'c.id')
            ->where('a.name', $s_name_eq, "%" . $name . "%")
            ->where('a.product_id', $s_product_id_eq, $product_id)
            ->where('a.status', '!=', 0)
            ->select('a.*', 'b.name as product_name', 'c.name as admin_name')
            ->orderBy('a.weight', 'desc')
            ->orderBy('a.add_time', 'desc')
            ->paginate($limit);

        return $data;
    }

    /*
     *新增Sku
     */
    public function add($name, $product_id, $cost, $weight, $price, $num)
    {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->cost = $cost;
        $this->weight = $weight;
        $this->price = $price;
        $this->num = $num;
        $this->add_time = date("Y-m-d H:i:s");
        $this->edit_time = date("Y-m-d H:i:s");
        $this->uid = session('admin_id', 1);
        $res = $this->save();

        return $res;
    }

    /*
     *删除Sku
     */
    public function del($id)
    {
        $res = self::whereIn('id', $id)
            ->update([
                'status' => 0, 
                'edit_time' => date("Y-m-d H:i:s"), 
                'uid' => session('admin_id', 0),
            ]);

        return $res;
    }    

    /*
     *sku上架下架
     */
    public function changeStatus($id)
    {
        $sku = self::where('status', '!=', 0)
            ->find($id);
        if (!$sku)
        {
            return false;
        }
        if ($sku->status == 2)
        {
            $sku->status = 1;
        }
        else {
            $sku->status = 2;
        }
        $sku->edit_time = date("Y-m-d H:i:s");
        $sku->uid = session('admin_id', 0);
        $res = $sku->save();

        return $res;
    }

    //根据id获取sku信息
    public function getSkuInfo($id)
    {
        $Admin = self::where('status', '!=', 0)
            ->find($id);

        return $Admin;
    }

    /*
     *修改sku信息
     */
    public function edit($id, $name, $product_id, $cost, $weight, $price, $num)
    {
        $data = [
            'weight' => $weight,
            'name' => $name,
            'edit_time' => date("Y-m-d H:i:s"), 
            'uid' => session('admin_id', 1),
            'product_id' => $product_id,
            'cost' => $cost,
            'weight' => $weight,
            'price' => $price,
            'num' => $num
        ];
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
