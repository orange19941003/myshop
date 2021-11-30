@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item">
        <label class="layui-form-label">商品名</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" lay-verify="name" lay-verify="required" lay-reqtext="商品名是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$product->name}}">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否热卖</label>
        <div class="layui-input-block">
            <input type="radio" name="is_hot" value="1" title="是" @if($product->is_hot == 1)checked="checked"@endif>
            <input type="radio" name="is_hot" value="0" title="否" @if($product->is_hot == 0)checked="checked"@endif>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">商品分类</label>
        <div class="layui-input-block">
            <select name="cate_id" id="cate_id" lay-verify="">
                <option value="0">请选择</option>
                @foreach($cates as $cate)
                <option value="{{$cate->id}}" @if($product->cate_id == $cate->id)selected="selected"@endif>{{$cate->name}}</option>
                @endforeach
                </select>  
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权重</label>
        <div class="layui-input-block">
            <input type="text" name="weight" id="weight" lay-verify="name" lay-verify="required" lay-reqtext="权重是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$product->weight}}">
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
            var is_hot = $("input[name='is_hot']:checked").val();
            var cate_id = $("#cate_id").val();
            $.ajax({
                type:"post",
                url:"",
                dataType:'json', 
                data: {name:name,_token:_token,weight:weight,is_hot:is_hot,cate_id:cate_id},
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