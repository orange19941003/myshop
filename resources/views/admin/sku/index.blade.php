@extends('admin.base')
@section('main')
<div style="padding: 15px;">
    <span class="layui-breadcrumb" lay-separator=">"><a>{{$TagOne->name}}</a><a href="">{{$TagTwo->name}}</a></span>
    <div style="margin-top: 20px">
    <button class="layui-btn" id="add">增加</button>
    <button class="layui-btn" id="del">批量删除</button>
    <form class="layui-form" action="">
      <div class="layui-input-inline" style="width: 300px;margin-left: 40%">
      	<label class="layui-form-label">属性名</label>
          <div class="layui-input-inline">
              <input type="text" name="name" id="name" lay-verify="name" autocomplete="off" class="layui-input">
          </div>
      </div>
      <div class="layui-input-inline" style="width: 300px;margin-left: 1%">
        <label class="layui-form-label">所属商品</label>
        <div class="layui-input-block">
          <select name="product_id" id="cate_id" lay-verify="" lay-search>
            <option value="0">请选择/搜索</option>
            @foreach($Products as $product)
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
  var table = layui.table;
  var name = '';
  var product_id = 0;
  render(name, product_id);
  function render(name, product_id)
  {
  	//第一个实例
  	table.render({
  	  	id:'idTest',
  	    elem: '#demo'
  	    ,height: 500
  	    ,url: 'list' //数据接口
  	    ,page: true //开启分页
  	    ,where:{name:name, product_id:product_id}
  	    ,limit:10
  	    ,cols: [[ //表头
  	    	{type: 'checkbox', fixed: 'left'}
  	      	,{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
  	      	,{field: 'product_name', title: '所属商品名', width:200}
            ,{field: 'name', title: '属性名', width:200}
            ,{field: 'weight', title: '权重', width:100}
            ,{field: 'price', title: '售价', width:100, templet: function(d){
                return d.price/100;
              }
            }
            ,{field: 'cost', title: '成本', width:100, templet: function(d){
                return d.cost/100;
              }
            }
            ,{field: 'num', title: '库存', width:100}
            ,{field: 'status', title: '状态', width:200,templet: function(d){
                if (d.status == 1)
                {
                  return '已上架&nbsp&nbsp<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="changeStatus">去下架</a>';                  
                }
                if (d.status == 2)
                {
                  return '待上架&nbsp&nbsp<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="changeStatus">去上架</a>';
                }
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
  		var name=$("#name").val();
      var product_id = $("#product_id").val();
  		render(name, product_id);
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
                        render(name, product_id);
                    }
                }
            })
      	});
    } else if (obj.event === 'edit') {
      	var id = obj.data.id;
      	var index = layer.open({
	  		title:'新增',
	  		area:["1500px", "800px"],
	  		type: 2,
		  	content: 'edit/' + id,
		  });
    } else if (obj.event === 'changeStatus') {
        var id = obj.data.id;
        $.ajax({
          type:"get",
          url:"changeStatus/"+id,
          dataType:'json', 
          data: {},
          success:function(res) {
              if (res.code != 200)
              {
                  layer.msg(res.msg)
              } else {
                  layer.msg(res.msg);
                  render(name, product_id);
              }
          }
        })
    }
  });

  $("#add").on('click', function(){
  	var index = layer.open({
  		title:'新增',
  		area:["1500px", "800px"],
  		type: 2,
	  	content: 'add',
	});
  })


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
                        render(name, product_id);
                    }
                }
            })
      	});
	});

});
</script>
@endsection