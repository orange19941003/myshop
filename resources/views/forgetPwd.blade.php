@extends('base')
@section('main')

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active">找回密码</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Register Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <!-- Register Wrapper Start -->
                    <div class="register-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">重置密码</h2>
                            <p class="desc-content">请使用下面的帐户详细信息重置密码</p>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form action="#" method="post">
                            @csrf
                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" id="pwd_one" placeholder="密码">
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" id="pwd_two" placeholder="确认密码">
                            </div>
                            <!-- Input Password End -->

                            <!-- Input Email Or Username Start -->
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="邮箱" id="email">
                            </div>
                            <!-- Input Email Or Username End -->
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="验证码" id="code" style="width: 55%;margin-right: 2%">
                                <button type="button" class="btn btn btn-dark btn-hover-primary rounded-0" onclick="sendCode(60,this);return false;">点击获取验证码</button>
                            </div>

                            <!-- Register Button Start -->
                            <div class="single-input-item mb-3">
                                <button type="button" class="btn btn btn-dark btn-hover-primary rounded-0" onclick="register();return false;">确认修改</button>
                            </div>
                            <!-- Register Button End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                    <!-- Register Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
@endsection

@section('script')
<script type="text/javascript">
    function sendCode(seconds,obj){
        var email = $("#email").val();
        if (email == '')
        {
            layer.msg('邮箱不能为空');
            
            return false;
        }
        $.ajax({
            type:"post",
            url:"sendCode",
            dataType:'json', 
            data: {email:email},
            success:function(res) {
                if (res.code != 2000)
                {
                    layer.msg(res.msg)
                } else {
                    daojishi(seconds,obj);
                    
                }
            }
        })
    }

    function daojishi(seconds, obj)
    {
        if (seconds > 1){
            seconds--;
            $(obj).html(seconds+"秒后可重新获取 ").attr("disabled", true);//禁用按钮
            // 定时1秒调用一次
            setTimeout(function(){
                daojishi(seconds,obj);
            },1000);
        }else{
            $(obj).val("免费获取验证码").attr("disabled", false);//启用按钮
        }
    }

    function register()
    {
        var email = $("#email").val(),
        _token = $("input[name='_token']").val(),
        name = $("#name").val(),
        pwd_one = $("#pwd_one").val(),
        pwd_two = $("#pwd_two").val(),
        code = $("#code").val()
        ;
        if (email == '')
        {
            layer.msg('邮箱不能为空');
            
            return false;
        }
        if (pwd_two != pwd_one)
        {
            layer.msg('两次密码不同');
            
            return false;   
        }
        $.ajax({
            type:"post",
            url:"",
            dataType:'json', 
            data: {email:email,_token:_token,pwd_one:pwd_one,pwd_two:pwd_two,code:code},
            success:function(res) {
                if (res.code != 2000)
                {
                    layer.msg(res.msg)
                } else {
                    window.location.href = 'login'
                }
            }
        })
    }
</script>
@endsection