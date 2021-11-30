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
        return self::where('status', 1)->get();
    }

    public function getSkuList($limit, $name)
    {
        $s_name_eq = $name != '' ? 'like' : '!='; 
        $data = self::where('status', 1)
            ->where('name', $s_name_eq, "%" . $name . "%")
            ->paginate($limit);

        return $data;
    }

    /*
     *新增管理员
     */
    public function add($name, $pwd, $roles)
    {
        $this->name = $name;
        $this->add_time = date("Y-m-d H:i:s");
        $this->edit_time = date("Y-m-d H:i:s");
        $this->locktime = date("Y-m-d H:i:s");
        $this->uid = session('uid', 1);
        $this->role_json = $roles;
        $this->pwd = md5($pwd . config('app.pwd_salt'));
        $res = $this->save();

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
                'uid' => session('uid', 1),
            ]);

        return $res;
    }    

    //根据id获取管理员信息
    public function getSkuInfo($id)
    {
        $Sku = self::where('status', 1)
            ->find($id);

        return $Sku;
    }

    /*
     *修改管理员信息
     */
    public function edit($id, $name, $pwd, $roles)
    {
        $data = [
            'name' => $name,
            'edit_time' => date("Y-m-d H:i:s"), 
            'uid' => session('uid', 1),
            'role_json' => $roles
        ];

        if ($pwd)
        {
            $data['pwd'] = md5($pwd . config('app.pwd_salt')); 

        }
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
