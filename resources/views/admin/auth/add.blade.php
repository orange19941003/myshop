@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">权限名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="权限名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">url</label>
        <div class="layui-input-block">
            <input type="text" name="url"  id="url" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
  
    <div class="layui-form-item">
        <label class="layui-form-label">权限等级</label>
        <div class="layui-input-block">
            <select name="grade" id="grade" lay-filter="grade">
                <option value="">请选择</option>
                <option value="1">一级</option>
                <option value="2">二级</option>
                <option value="3">三级</option>
            </select>
        </div>
    </div>
  
    <div class="layui-form-item pid" style="display: none;">
        <label class="layui-form-label">父级权限</label>
        <div class="layui-input-block">
            <select name="pid" lay-filter="pid" id="pid">
                <option value="">请选择</option>
                @foreach($auths[1] as $vo)
                <option value="{{$vo->id}}" class="p1">{{$vo->name}}</option>
                    @foreach($auths[2] as $voo)
                        @if($voo->pid == $vo->id)
                        <option value="{{$voo->id}}" class="p2">&nbsp&nbsp&nbsp&nbsp————{{$voo->name}}</option>
                        @endif
                    @endforeach
                @endforeach
                
            </select>
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

        form.on('select(grade)', function(data){
            var selected = data.value;
            if (selected == 1)
            {
                $(".pid").hide();
            }
            if (selected == 2)
            {
                $(".pid").show();
            }
            if (selected == 3)
            {
                $(".pid").show();
            }
        })
        $("#demo1").on('click', function(){
            var name = $("#name").val();
            var url = $("#url").val();
            var grade = $("#grade").val();
            var pid = $("#pid").val();
            var _token = $("input[name='_token']").val();
            $.ajax({
                type:"post",
                url:"add",
                dataType:'json', 
                data: {name:name,url:url,grade:grade,pid:pid,_token:_token},
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