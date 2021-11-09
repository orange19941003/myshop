<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
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

    public static function getAuthById($id)
    {
        return self::find($id);
    }

    public function getAuthList($limit, $name)
    {
        $s_name_eq = $name != '' ? 'like' : '!='; 
        $data = self::from('auths as a')
            ->where('a.status', 1)
            ->where('a.name', $s_name_eq, "%" . $name . "%")
            ->leftJoin('auths as b', 'b.id', '=', 'a.pid')
            ->select('a.id', 'a.name', 'a.url', 'a.addtime', 'a.edittime', 'a.grade', 'a.pid', 'b.name as pname')
            ->paginate($limit);

        return $data;
    }

    /*
     *新增权限
     */
    public function add($name, $url, $grade, $pid)
    {
        $this->name = $name;
        $this->url = $url;
        $this->grade = $grade;
        $this->pid = $pid;
        $this->addtime = date("Y-m-d H:i:s");
        $this->edittime = date("Y-m-d H:i:s");
        $res = $this->save();

        return $res;
    }

    /*
     *删除权限
     */
    public function del($id)
    {
        $res = self::whereIn('id', $id)
            ->update(['status' => 0, 'edittime' => date("Y-m-d H:i:s")]);

        return $res;
    }    

    //根据id获取权限信息
    public function getAuthInfo($id)
    {
        $auth = self::where('status', 1)
            ->find($id);

        return $auth;
    }

    /*
     *修改权限
     */
    public function edit($id, $name, $url, $grade, $pid)
    {
        $data = [];
        $data['edittime'] = date("Y-m-d H:i:s");
        $data['name'] = $name;
        $data['url'] = $url;
        $data['grade'] = $grade;
        $data['pid'] = $pid;
        $res = self::where('id', $id)
            ->update($data);

        return $res;
    }
}
