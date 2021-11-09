@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">角色名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="用户名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权限</label>
        <div class="layui-input-block">
            <div id="test1"></div>
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
        var id = '';
        $("#demo1").on('click', function(){
            var name = $("#name").val();
            var _token = $("input[name='_token']").val();
            var checkData = tree.getChecked('demoId');
            var id = getChecked_list(checkData);
            console.log(id);
            $.ajax({
                type:"post",
                url:"add",
                dataType:'json', 
                data: {name:name,_token:_token,id:id},
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
    var tree = layui.tree;
    layui.use('tree', function(){
        var treeJson = <?php echo $treeAuths; ?>;
        //渲染
        var inst1 = tree.render({
            elem: '#test1'  //绑定元素
            ,data: treeJson
            ,showCheckbox: true
            ,id: 'demoId' //定义索引
            ,oncheck: function(obj){
                var checkData = tree.getChecked('demoId');
                id = getChecked_list(checkData);
                console.log(id);
            }
        });
    });

     // 获取选中节点的id
    function getChecked_list(data) {
        var id = "";
        $.each(data, function (index, item) {
            if (id != "") {
                id = id + "," + item.id;
            }
            else {
                id = item.id;
            }
            var i = getChecked_list(item.children);
            if (i != "") {
                id = id + "," + i;
            }
        });
        return id;
    }
    </script>
@endsection