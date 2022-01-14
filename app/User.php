<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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

    public static function getUserById($id)
    {
        return self::find($id);
    }

    public function getUserList($limit, $name, $start_time, $end_time)
    {
        $s_name_eq = $name != '' ? 'like' : '!='; 
        $data = self::where('status', 1)
            ->where('name', $s_name_eq, "%" . $name . "%")
            ->where('created_time', '>=', $start_time)
            ->where('created_time', '<=', $end_time)
            ->paginate($limit);

        return $data;
    }

    /*
     *新增用户
     */
    public function add($name, $pwd, $email)
    {
        $this->name = $name;
        $this->updated_time = date("Y-m-d H:i:s");
        $this->created_time = date("Y-m-d H:i:s");
        $this->email = $email;
        $this->password = md5($pwd . config('app.pwd_salt'));
        $res = $this->save();

        return $res;
    }

    /*
     *删除用户
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

    //根据id获取用户信息
    public function getAdminInfo($id)
    {
        $Admin = self::where('status', 1)
            ->find($id);

        return $Admin;
    }

    /*
     *修改用户信息
     */
    public function edit($id, $name, $pwd)
    {
        $data = [
            'name' => $name,
            'created_time' => date("Y-m-d H:i:s"), 
        ];
        if ($pwd)
        {
            $data['password'] = md5($pwd . config('app.pwd_salt')); 
        }
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
