@extends('admin.comm')
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="layui-form" action="">
    @csrf
    <div class="layui-form-item" style="margin-left: 100px">
        <div class="layui-upload">
        <button type="button" class="layui-btn" id="test2">图片上传</button> 
        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
            预览图：
                <div class="layui-upload-list" id="demo2">
                    <img style="weight:100px;height:50px" src="{{config('app.url') . $ProductImg->img_url }}" id="img">
                </div>
            </blockquote>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权重</label>
        <div class="layui-input-block">
            <input type="text" name="weight" id="weight" lay-verify="name" lay-verify="required" lay-reqtext="权重是必填项，不能为空？" autocomplete="off" placeholder="请输入" class="layui-input" value="{{$ProductImg->weight}}">
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
        upload = layui.upload,
        $ = layui.jquery,
        img = '';
        $("#demo1").on('click', function(){
            var weight = $("#weight").val();
            var _token = $("input[name='_token']").val();
            $.ajax({
                type:"post",
                url:"",
                dataType:'json', 
                data: {_token:_token,weight:weight,url:img},
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

        //多图片上传
        upload.render({
            elem: '#test2'
            ,url: '/upload/uploadImg' //此处配置你自己的上传接口即可
            ,multiple: true
            ,done: function(res){
                //上传完毕
                if (res.code == 2000)
                {
                    $("#img").attr('src', '{{config("app.url")}}' + res.data.url);
                    img = res.data.url;
                }
                else
                {
                    layer.msg(res.msg);
                }
            }
        });
    </script>
@endsection