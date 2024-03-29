@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="用户名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="pwd" id="pwd" lay-verify="name" lay-verify="required" lay-reqtext="密码是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
            @foreach($roles as $role)
            <input type="checkbox" name="role" title="{{$role->name}}" lay-skin="primary" value="{{$role->id}}">
            @endforeach
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="button" class="layui-btn" lay-submit="" lay-filter="demo1" id="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script type="text/javascript">
        var form = layui.form,
            $ = layui.jquery;
        $("#demo1").on('click', function(){
            var name = $("#name").val();
            var _token = $("input[name='_token']").val();
            var pwd = $("#pwd").val();
            var roles = Array();
            $('input[name="role"]:checked').each(function(){    
                roles.push($(this).val());    
            });
            var json_roles = JSON.stringify(roles);
            $.ajax({
                type:"post",
                url:"add",
                dataType:'json', 
                data: {name:name,_token:_token,roles:json_roles,pwd:pwd},
                success:function(res) {
                    if (res.code != 200)
                    {
                        layer.msg(res.msg)
                    } else {
                        layer.msg(res.msg);
                        parent.location.reload()
                    }
                }
            })
        })
    </script>
@endsection