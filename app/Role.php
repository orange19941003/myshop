<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public static function getRoleById($id)
    {
        return self::find($id);
    }

    public function getRoleList($limit, $name)
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
    public function add($name, $auth_json)
    {
        $this->name = $name;
        $this->auth_json = $auth_json;
        $this->add_time = date("Y-m-d H:i:s");
        $this->edit_time = date("Y-m-d H:i:s");
        $this->uid = session('admin_id', 1);
        $res = $this->save();

        return $res;
    }

    /*
     *删除管理员
     */
    public function del($id)
    {
        $res = self::whereIn('id', $id)
            ->update(['status' => 0, 'edit_time' => date("Y-m-d H:i:s"), 'uid' => session('admin_id', 1)]);

        return $res;
    }    

    //根据id获取管理员信息
    public function getRoleInfo($id)
    {
        $Role = self::where('status', 1)
            ->find($id);

        return $Role;
    }

    /*
     *修改管理员信息
     */
    public function edit($id, $name, $auth_json)
    {
        try{
            $res = self::where('id', $id)
                ->update([
                    'name' => $name, 
                    'edit_time' => date("Y-m-d H:i:s"), 
                    'uid' => session('admin_id', 1), 
                    'auth_json' => $auth_json
                ]);
        } catch (Exception $e){
            // dd($e->getMessage());
        }
        

        return $res;
    }

    /*
     *获取
     */
    public static function getRoleAthus($role_id)
    {
        $res = self::where('status', 1)
            ->where('id', $role_id)
            ->value('auth_json');
        if ($res)
        {
            return json_decode($res, true);
        }

        return [];
    }
}
