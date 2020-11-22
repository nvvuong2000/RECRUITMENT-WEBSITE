<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerfy</title>

    <!-- Css -->
    <link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/flat-icon.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/plugin.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/1e671.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="{{asset('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Wrapper -->
    <div class="careerfy-wrapper">

        <!-- Header -->
        <header id="careerfy-header" class="careerfy-header-one">
            <div class="container">
                <div class="row">
                    <aside class="col-md-2"> <a href="index-2.html" class="careerfy-logo"><img src="{{('public/images/logo.png')}}" alt=""></a> </aside>
                    <aside class="col-md-6">
                        <nav class="careerfy-navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#careerfy-navbar-collapse-1" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="careerfy-navbar-collapse-1">
                                <ul class="navbar-nav">
                                    <li class="active"><a href="{{URL::to('/trangchu')}}">TRANG CHỦ</a>

                                    </li>
                                    <li><a href="#">TIN TỨC</a>

                                    </li>
                                    <li><a href="{{URL::to('/nguoi-tim-viec')}}">TÌM VIỆC</a>

                                    </li>
                                    <li><a href="{{URL::to('/nguoi-tuyen-dung')}}">TUYỂN DỤNG</a></li>

                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </aside>

                    </ul>
                    <aside class="col-md-4">
                        <div class="careerfy-right">
                            <?php
                            $link_dang_nhap = URL::to('dang-nhap');
                            $link_dang_ky = URL::to('dang-ki-uv');
                            $link_dang_xuat = URL::to('dang-xuat');
                            $link_thong_tin_doanh_nghiep = URL::to('thongtin-doanhnghiep');
                            // $f1 =  
                            // $f2 =  
                            if (isset($_SESSION['id'])) {
                                echo
                                    "<ul class='careerfy-user-section'>
                        <li><span class='careerfy-color careerfy-open-signin-tab' href='{$link_dang_nhap}'>Xin chào :<i class='far fa-user'></i> {$_SESSION["name"]}</span></li>
                        <li class='jobsearch-userdash-menumain menu-item menu-item-has-children'>
     <a href='https://careerfy.net/demo/user-dashboard/' class='jobsearch-color   active'><i class='far fa-angle-down'></i></a>
     <ul class='nav-item-children sub-menu '>
     
         <li>
             <a href='{$link_thong_tin_doanh_nghiep}'>
                 <i class='jobsearch-icon jobsearch-user'></i>
                 Thông tin doanh nghiệp</a></li>
         <li>
             <a href='https://careerfy.net/demo/user-dashboard/?tab=my-resume'>
                 <i class='jobsearch-icon jobsearch-resume'></i>
                 My Resume </a></li>
         <li>
             <a href='${link_dang_xuat}'>
                 <i class='jobsearch-icon jobsearch-resume'></i>
                 Đăng Xuất </a></li>
     </ul>
</li>";
                            } else {
                                echo
                                    "<ul class='careerfy-user-section'>
            <li><a class='careerfy-color careerfy-open-signin-tab' href='{$link_dang_nhap}'>ĐĂNG KÍ</a></li>
            <li><a class='careerfy-color careerfy-open-signup-tab' href='{$link_dang_nhap}'>ĐĂNG NHẬP</a></li>";
                            }
                            ?>
                        </div>
                    </aside>
                </div>
            </div>
        </header>
        <!-- Header -->

        <!-- Banner -->
        <div class="careerfy-banner careerfy-typo-wrap">
            <span class="careerfy-banner-transparent"></span>
            <div class="careerfy-banner-caption">
                <div class="container">

                    <form class="careerfy-banner-search" action="{{URL::to('/tim-kiem')}}" method="get">
                        {{csrf_field()}}
                        <ul>
                            <li>
                                <input value="Nhập tên công việc cần tìm" name="keyword" onblur="if(this.value == '') { this.value ='Nhập tên công việc cần tìm'; }" onfocus="if(this.value =='Nhập tên công việc cần tìm') { this.value = ''; }" type="text">
                            </li>
                            <li>
                                <input value="Tỉnh, thành phố" onblur="if(this.value == '') { this.value ='Tỉnh, thành phố'; }" onfocus="if(this.value =='Tỉnh, thành phố') { this.value = ''; }" type="text">
                                <i class="careerfy-icon careerfy-location"></i>
                            </li>
                            <li>
                                <div class="careerfy-select-style">
                                    <select>
                                        <option>Toàn thời gian</option>
                                        <option>Bán thời gian</option>
                                        <option>Thời vụ</option>
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="careerfy-icon careerfy-search"></i> </li>
                        </ul>
                    </form>

                </div>
            </div>
        </div>
        <!-- Banner -->

        <!-- Main Content -->
        <div class="careerfy-main-content">

            <!-- Main Section -->
            <div class="careerfy-main-section careerfy-counter-full">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">

                        </div>

                    </div>
                </div>
            </div>
            <!-- Main Section -->
            @yield('home_content')




            <!-- Footer -->
            <footer id="careerfy-footer" class="careerfy-footer-one">


                <!-- CopyRight -->
                <div class="careerfy-copyright">
                    <p>Copyrights © 2018 All Rights Reserved by <a href="#" class="careerfy-color">EyeCix</a></p>
                    <ul class="careerfy-social-network">
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-facebook"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-twitter"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-dribbble"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-linkedin"></a></li>
                        <li><a href="#" class="careerfy-bgcolorhover fa fa-instagram"></a></li>
                    </ul>

                    <!-- CopyRight -->
                </div>
            </footer>
            <!-- Footer -->

        </div>
        <!-- Wrapper -->

        <!-- ModalLogin Box -->
        <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalSignup">
            <div class="modal-inner-area">&nbsp;</div>
            <div class="modal-content-area">
                <div class="modal-box-area">

                    <div class="careerfy-modal-title-box">
                        <h2>Login to your account</h2>
                        <span class="modal-close"><i class="fa fa-times"></i></span>
                    </div>
                    <form>
                        <div class="careerfy-box-title">
                            <span>Choose your Account Type</span>
                        </div>
                        <div class="careerfy-user-options">
                            <ul>
                                <li class="active">
                                    <a href="#">
                                        <i class="careerfy-icon careerfy-user"></i>
                                        <span>Candidate</span>
                                        <small>I want to discover awesome companies.</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="careerfy-icon careerfy-building"></i>
                                        <span>Employer</span>
                                        <small>I want to attract the best talent.</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="careerfy-user-form">
                            <ul>
                                <li>
                                    <label>Email Address:</label>
                                    <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-mail"></i>
                                </li>
                                <li>
                                    <label>Password:</label>
                                    <input value="Enter Password" onblur="if(this.value == '') { this.value ='Enter Password'; }" onfocus="if(this.value =='Enter Password') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-multimedia"></i>
                                </li>
                                <li>
                                    <input type="submit" value="Sign In">
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="careerfy-user-form-info">
                                <p>Forgot Password? | <a href="#">Sign Up</a></p>
                                <div class="careerfy-checkbox">
                                    <input type="checkbox" id="r10" name="rr" />
                                    <label for="r10"><span></span> Remember Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="careerfy-box-title careerfy-box-title-sub">
                            <span>Or Sign In With</span>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="careerfy-login-media">
                            <li><a href="#"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                            <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                            <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                            <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                        </ul>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal Signup Box -->
        <div class="careerfy-modal fade careerfy-typo-wrap" id="JobSearchModalLogin">
            <div class="modal-inner-area">&nbsp;</div>
            <div class="modal-content-area">
                <div class="modal-box-area">

                    <div class="careerfy-modal-title-box">
                        <h2>Signup to your account</h2>
                        <span class="modal-close"><i class="fa fa-times"></i></span>
                    </div>
                    <form>
                        <div class="careerfy-box-title">
                            <span>Choose your Account Type</span>
                        </div>
                        <div class="careerfy-user-options">
                            <ul>
                                <li class="active">
                                    <a href="#">
                                        <i class="careerfy-icon careerfy-user"></i>
                                        <span>Candidate</span>
                                        <small>I want to discover awesome companies.</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="careerfy-icon careerfy-building"></i>
                                        <span>Employer</span>
                                        <small>I want to attract the best talent.</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="careerfy-user-form careerfy-user-form-coltwo">
                            <ul>
                                <li>
                                    <label>First Name:</label>
                                    <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-user"></i>
                                </li>
                                <li>
                                    <label>Last Name:</label>
                                    <input value="Enter Your Name" onblur="if(this.value == '') { this.value ='Enter Your Name'; }" onfocus="if(this.value =='Enter Your Name') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-user"></i>
                                </li>
                                <li>
                                    <label>Email Address:</label>
                                    <input value="Enter Your Email Address" onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }" onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-mail"></i>
                                </li>
                                <li>
                                    <label>Phone Number:</label>
                                    <input value="Enter Your Phone Number" onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }" onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }" type="text">
                                    <i class="careerfy-icon careerfy-technology"></i>
                                </li>
                                <li class="careerfy-user-form-coltwo-full">
                                    <label>Categories:</label>
                                    <div class="careerfy-profile-select">
                                        <select>
                                            <option>Sales & Marketing</option>
                                            <option>Sales & Marketing</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="careerfy-user-form-coltwo-full">
                                    <img src="{{('public/frontend/images
-robot.png')}}" alt="">
                                </li>
                                <li class="careerfy-user-form-coltwo-full">
                                    <input type="submit" value="Sign Up">
                                </li>
                            </ul>
                        </div>
                        <div class="careerfy-box-title careerfy-box-title-sub">
                            <span>Or Sign Up With</span>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="careerfy-login-media">
                            <li><a href="#"><i class="fa fa-facebook"></i> Sign In with Facebook</a></li>
                            <li><a href="#" data-original-title="google"><i class="fa fa-google"></i> Sign In with Google</a></li>
                            <li><a href="#" data-original-title="twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</a></li>
                            <li><a href="#" data-original-title="linkedin"><i class="fa fa-linkedin"></i> Sign In with LinkedIn</a></li>
                        </ul>
                    </form>

                </div>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{('public/frontend/script/jquery.js')}}"></script>
        <script src="{{('public/frontend/script/bootstrap.js')}}"></script>
        <script src="{{('public/frontend/script/slick-slider.js')}}"></script>
        <script src="{{('public/frontend/script/counter.js')}}"></script>
        <script src="{{('public/frontend/script/progressbar.js')}}"></script>
        <script src="{{('public/frontend/script/fancybox.pack.js')}}"></script>
        <script src="{{('public/frontend/script/isotope.min.js')}}"></script>
        <script src="{{('public/frontend/script/functions.js')}}"></script>
        <script src="{{('public/frontend/script/functions.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:24 GMT -->

</html>