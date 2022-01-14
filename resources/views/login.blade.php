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
                        <li class="active"> Login Page</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Login Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Login</h2>
                            <p class="desc-content">Please login using account detail bellow.</p>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form action="#" method="post">
                             @csrf
                            <!-- Input Email Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" id="name" placeholder="Email or Username" value="{{$name}}">
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" id="pwd" placeholder="Enter your Password" value="{{$pwd}}">
                            </div>
                            <!-- Input Password End -->

                            <!-- Checkbox/Forget Password Start -->
                            <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe" @if($rememberMe) checked="true" @endif>
                                            <label class="custom-control-label" for="rememberMe">记住密码</label>
                                        </div>
                                    </div>
                                    <a href="forgetPwd" class="forget-pwd mb-3">忘记密码?</a>
                                </div>
                            </div>
                            <!-- Checkbox/Forget Password End -->

                            <!-- Login Button Start -->
                            <div class="single-input-item mb-3">
                                <button class="btn btn btn-dark btn-hover-primary rounded-0" onclick="login();return false;">登录</button>
                            </div>
                            <!-- Login Button End -->

                            <!-- Lost Password & Creat New Account Start -->
                            <div class="lost-password">
                                <a href="register">注册</a>
                            </div>
                            <!-- Lost Password & Creat New Account End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection
 
@section('script')
<script type="text/javascript">
    function login()
    {
        var _token = $("input[name='_token']").val(),
        name = $("#name").val(),
        pwd = $("#pwd").val()
        rememberMe = $("#rememberMe").is(":checked")
        ;
        if (name == '' || pwd == '')
        {
            layer.msg('邮箱/用户/密码名不能为空');
            
            return false;
        }
        $.ajax({
            type:"post",
            url:"",
            dataType:'json', 
            data: {_token:_token,name:name,pwd:pwd,rememberMe:rememberMe},
            success:function(res) {
                if (res.code != 2000)
                {
                    layer.msg(res.msg)
                } else {
                    window.location.href = '/'
                }
            }
        })
    }
</script>
@endsection