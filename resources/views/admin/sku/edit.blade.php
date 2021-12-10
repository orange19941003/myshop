@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">属性名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="属性名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$Sku->name}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属商品</label>
        <div class="layui-input-block">
            <select name="product_id" id="product_id" lay-verify="" lay-search>
                <option value="0">请选择/搜索</option>
                @foreach($Products as $product)
                <option value="{{$product->id}}" @if($product->id == $Sku->product_id) selected="selected" @endif>{{$product->name}}</option>
                @endforeach
                </select>  
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-block">
            <input type="text" name="price" id="price" lay-verify="price" lay-verify="required" lay-reqtext="价格是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$Sku->price/100}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">成本</label>
        <div class="layui-input-block">
            <input type="text" name="cost" id="cost" lay-verify="cost" lay-verify="required" lay-reqtext="成本是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$Sku->cost/100}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">库存</label>
        <div class="layui-input-block">
            <input type="text" name="num" id="num" lay-verify="price" lay-verify="required" lay-reqtext="库存是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$Sku->num}}">
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
            var cost = $("#cost").val();
            var price = $("#price").val();
            var num = $("#num").val();
            var _token = $("input[name='_token']").val();
            var product_id = $("#product_id").val();
            $.ajax({
                type:"post",
                url:"",
                dataType:'json', 
                data: {name:name,_token:_token,weight:weight,cost:cost,price:price,num:num,product_id:product_id},
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