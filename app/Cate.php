<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
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

    public static function getCateById($id)
    {
        return self::find($id);
    }

    public function getCateList($limit, $name)
    {
        $s_name_eq = $name != '' ? 'like' : '!='; 
        $data = self::where('status', 1)
            ->where('name', $s_name_eq, "%" . $name . "%")
            ->orderBy('weight', 'desc')
            ->paginate($limit);

        return $data;
    }

    /*
     *新增分类
     */
    public function add($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->add_time = date("Y-m-d H:i:s");
        $this->edit_time = date("Y-m-d H:i:s");
        $this->uid = session('uid', 1);
        $res = $this->save();

        return $res;
    }

    /*
     *删除分类
     */
    public function del($id)
    {
        $res = self::whereIn('id', $id)
            ->update([
                'status' => 0, 
                'edit_time' => date("Y-m-d H:i:s"), 
                'uid' => session('uid', 1),
            ]);

        return $res;
    }    

    //根据id获取分类信息
    public function getCateInfo($id)
    {
        $Cate = self::where('status', 1)
            ->find($id);

        return $Cate;
    }

    /*
     *修改分类信息
     */
    public function edit($id, $name, $weight)
    {
        $data = [
            'name' => $name,
            'weight' => $weight,
            'edit_time' => date("Y-m-d H:i:s"), 
            'uid' => session('uid', 1),
        ];
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
