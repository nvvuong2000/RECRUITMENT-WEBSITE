<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerfy</title>

    <!-- Css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/flat-icon.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/flaticon.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('public/frontend/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/plugin.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css//material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
   -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .bg-soft-primary {
            background-color: rgba(85, 110, 230, .25) !important
        }
    </style>
</head>

<body>

 
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Get your free Skote account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('public/frontend/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets\images\logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                          
                            @if(session()->has('error'))
                            <div class="alert alert-info text-center " style="font-size:16px">
                                {{ session()->get('error') }}
                            </div>
                            @elseif(session()->has('success'))
                            <div class="alert alert-info text-center " style="font-size:16px">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            <div class="p-2">
                                <form class="form-horizontal" action="{{URL::to('/permission')}}" method="post">
                                    <!-- <form class="form-horizontal" action="index.html"> -->
                                    {{ csrf_field()}}
                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="text" class="form-control" name="user_email" placeholder="Nhập email" required="">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div> -->

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="user_matkhau" placeholder="Nhập mật khẩu" required="">
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Đăng nhập</button>
                                    </div>




                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Chưa có tài khoản ? <a href="{{URL :: to('/dang-ki-uv')}}" class="font-weight-medium text-primary"> Đăng kí ngay</a> </p>
                            <!-- <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="{{('public/frontend/script/jquery.js')}}"></script>
<script src="{{('public/frontend/script/bootstrap.js')}}"></script>
<script src="{{('public/frontend/script/slick-slider.js')}}"></script>
<script src="{{('public/frontend/script/counter.js')}}"></script>
<script src="{{('public/frontend/script/progressbar.js')}}"></script>
<script src="{{('public/frontend/script/fancybox.pack.js')}}"></script>
<script src="{{('public/frontend/script/isotope.min.js')}}"></script>
<script src="{{('public/frontend/script/functions.js')}}"></script>
<!-- <script src="{{('public/frontend/script/functions.js')}}"></script> -->
<script src="{{('public/frontend/script/jquery.min.js')}}"></script>
<script src="{{('public/frontend/script/jquery-ui.min.js')}}"></script>
<script src="{{('public/frontend/script/jquery.validate.min.js')}}"></script>
<script src="{{('public/frontend/script/additional-methods.min.js')}}"></script>
<script src="{{('public/frontend/script/main.js')}}"></script> -->

<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:24 GMT -->

</html>