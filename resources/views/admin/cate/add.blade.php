@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">分类名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="分类名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权重</label>
        <div class="layui-input-block">
            <input type="text" name="weight" id="weight" lay-verify="name" lay-verify="required" lay-reqtext="权重是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="100">
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
            var weight = $("#weight").val();
            var _token = $("input[name='_token']").val();
            $.ajax({
                type:"post",
                url:"add",
                dataType:'json', 
                data: {name:name,_token:_token,weight:weight},
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