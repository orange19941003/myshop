@extends('admin.base')
@section('main')
<div style="padding: 15px;">
    <span class="layui-breadcrumb" lay-separator=">"><a>{{$TagOne->name}}</a><a href="">{{$TagTwo->name}}</a></span>
    <div style="margin-top: 20px">
    <button class="layui-btn" id="del">批量删除</button>
    <form class="layui-form" action="">
      <div class="layui-input-inline" style="width: 400px;margin-left: 60%">
        <label class="layui-form-label">所属商品</label>
        <div class="layui-input-block">
          <select name="product_id" id="cate_id" lay-verify="" lay-search>
            <option value="0">请选择/搜索</option>
            @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>  
        </div>
      </div>
       <button class="layui-btn" id="query" type="button">查询</button>
    </form>
    <table id="demo" lay-filter="test"></table>
</div>
@endsection
  
@section('script')
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
layui.use('table', function(){
  var asset = "{{asset('/')}}";
  var table = layui.table;
  var product_id = 0;
  render(product_id);
  function render(product_id)
  {
    //第一个实例
    table.render({
        id:'idTest',
        elem: '#demo'
        ,height: 500
        ,url: 'list' //数据接口
        ,page: true //开启分页
        ,where:{product_id:product_id}
        ,limit:10
        ,cols: [[ //表头
          {type: 'checkbox', fixed: 'left'}
            ,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
            ,{field: 'name', title: '商品名', width:200}
            ,{field: 'weight', title: '权重', width:100}
            ,{field: 'url', title: '图片', width:100,templet: function(d){
                return '<img src="' + asset + d.img_url +' " class="layui-nav-img">';
              }
            }
            ,{field: 'add_time', title: '创建时间', width:200}
            ,{field: 'edit_time', title: '修改时间', width:200}
            ,{field: 'admin_name', title: '后台操作人', width:200}
            ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}
        ]]
    });
  }

    $("#query").on('click', function(){
      var product_id = $("#product_id").val();
      render(product_id);
    })


   //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
        layer.confirm('真的删除行么', function(index){
          var id = obj.data.id;
          $.ajax({
                type:"get",
                url:"del/"+id,
                dataType:'json', 
                data: {},
                success:function(res) {
                    if (res.code != 200)
                    {
                        layer.msg(res.msg)
                    } else {
                        layer.msg(res.msg);
                        render(name, is_hot, cate_id);
                    }
                }
            })
        });
    } else if (obj.event === 'edit') {
        var id = obj.data.id;
        var index = layer.open({
        title:'修改',
        area:["1500px", "800px"],
        type: 2,
        content: 'edit/' + id,
      });
    }
  });

  $("#del").on('click', function(){
    var checkStatus = table.checkStatus('idTest').data; //idTest 即为基础参数 id 对应的值
    var ids = '';
    checkStatus.forEach((value) =>
    {
      ids = ids + '|' + value.id;
    })
    layer.confirm('真的删除行么', function(index){
          $.ajax({
                type:"get",
                url:"del/"+ids,
                dataType:'json', 
                data: {},
                success:function(res) {
                    if (res.code != 200)
                    {
                        layer.msg(res.msg)
                    } else {
                        layer.msg(res.msg);
                        location.reload()
                    }
                }
            })
        });
  });

  $("body").on('click', '.layui-nav-img', function(){
    var html = '<img src="'+ this.src +'"  style="width: 600px;height: 400px">';
    layer.open({
      type: 1, 
      area: ["600px", "400px"],
      title: false,
      content: html //这里content是一个普通的String
    });
  })
});
</script>
@endsection