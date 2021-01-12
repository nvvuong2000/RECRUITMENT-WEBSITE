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
    <link href="{{asset('public/frontend/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/plugin.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/1e671.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style2.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/app1.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="{{asset('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        input[type="text"] {
            font-size: 16px !important;
        }

        label {
            font-size: 18px !important;
            font-weight: bold !important;
        }

        h2 {
            text-transform: uppercase;
        }

        tr td i[class*="fas"] {
            display: block;
            height: 100%;
            width: 100%;
            margin: auto;
        }

        .careerfy-select-style:after {
            content: none;
        }
    </style>
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
                            $link_thong_tin_ung_vien = URL::to('thongtin-ungvien');
                            $link_thay_doi_mk = URL::to('/thaydoimatkhau');
                            if (isset($_SESSION['id'])) {
                                if (isset($_SESSION["id_quyen"])  && $_SESSION["id_quyen"] == 1) {
                                    echo
                                        "<ul class='careerfy-user-section'>
                        <li><span class='careerfy-color careerfy-open-signin-tab' href='{$link_dang_nhap}'>Xin chào :<i class='far fa-user'></i> {$_SESSION["name"]}</span></li>
                        <li class='jobsearch-userdash-menumain menu-item menu-item-has-children'>
     <a  class='jobsearch-color   active'><i class='fa fa-caret-down' aria-hidden='true'></i></a> 
     <ul class='nav-item-children sub-menu '>
    
     
         <li>
             <a style='font-size:13px' href='{$link_thong_tin_doanh_nghiep}'>
                  <i class='fas fa-id-card'></i>
                 Thông tin doanh nghiệp</a></li>
     <li>
             <a href='${link_thay_doi_mk}'>
                  <i class='fas fa-key'></i>
                 Thay đổi mật khẩu </a></li>
             <a href='${link_dang_xuat}'>
                 <i class='fas fa-sign-out-alt'></i>
                 Đăng Xuất </a></li>
     </ul>
</li>";
                                } else if (isset($_SESSION["id_quyen"])  && $_SESSION["id_quyen"] == 0) {
                                    echo
                                        "<ul class='careerfy-user-section'>
                        <li><span class='careerfy-color careerfy-open-signin-tab' href='{$link_dang_nhap}' style='font-size:16px'>Xin chào :<i class='fas fa-user-circle'></i> {$_SESSION["name"]}</span></li>
                        <li class='jobsearch-userdash-menumain menu-item menu-item-has-children'>
     <a  class='jobsearch-color   active'><i class='fa fa-caret-down' aria-hidden='true'></i></a>
     <ul class='nav-item-children sub-menu '>
     
         <li>
             <a href='{$link_thong_tin_ung_vien}'>
                <i class='fas fa-id-card'></i>
                 Thông tin ứng viên</a></li>
         <li>
             <a href='${link_thay_doi_mk}'>
                 <i class='fas fa-key'></i>
                 Thay đổi mật khẩu </a></li>
         <li>
             <a href='${link_dang_xuat}'>
                 <i class='fas fa-sign-out-alt'></i>
                 Đăng Xuất </a></li>
     </ul>
</li>";
                                }
                            } else {
                                echo
                                    "<ul class='careerfy-user-section'>
            <li><a class='careerfy-color careerfy-open-signin-tab' href='{$link_dang_ky}'>ĐĂNG KÍ</a></li>
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
        <div class="careerfy-banner careerfy-typo-wrap" style="background-attachment: fixed;
    background: url(https://www.internship.edu.vn/wp-content/uploads/2015/01/banner-background.jpg);
    background-size: cover;
    background-position: center;">
            <span class="careerfy-banner-transparent"></span>
            <div class="careerfy-banner-caption">
                <div class="container">
                    <form class="careerfy-banner-search" action="{{URL::to('/tim-kiem')}}" method="get">
                        {{csrf_field()}}
                        <ul>
                            <li>
                                <input value="" placeholder="Nhập tên công việc cần tìm!" name="keyword" type="text">
                            </li>
                            <li>
                                <i class="fab fa-map-marker-alt"></i>

                                <div class="careerfy-select-style">
                                    <select name="tinh">
                                        <option value="0" selected>Vui lòng chọn</option>
                                        @foreach($tinhthanh as $key => $tinhthanh)
                                        <option value="{{!empty($tinhthanh->tinhthanh_id)? $tinhthanh->tinhthanh_id:''}}"> {{(!empty($tinhthanh->tinhthanh_name))? $tinhthanh->tinhthanh_name: '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li>

                                <div class="careerfy-select-style">
                                    <i class="fab fa-filter"></i>
                                    <select name="nganh">
                                        <option value="0" selected>Vui lòng chọn</option>
                                        @foreach($loainganhnghe as $key => $loai)
                                        <option value="{{$loai->nganhnghe_id}}">{{$loai->nganhnghe_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="careerfy-banner-submit"> <input type="submit" value=""> <i class="fas fa-search"></i> </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!-- Banner -->
        <div class="careerfy-breadcrumb">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <!-- <li class="active">User Login</li> -->
            </ul>
        </div>
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
            @yield('home_layout')
            @yield('home_content')
            <!-- Footer -->
            <footer id="careerfy-footer" class="careerfy-footer-one">
                <!-- CopyRight -->
                <div class="careerfy-copyright">
                    <!-- <p>Copyrights © 2018 All Rights Reserved by <a href="#" class="careerfy-color">EyeCix</a></p> -->
                    <ul class="careerfy-social-network">
                        <li><a href="#"> <i class=" fab fa-facebook"></i></a></li>
                        <li><a href="#"> <i class="fab fa-twitter"></i></a></li>

                        <li><a href="#"> <i class="fab fa-instagram-square"></i></a></li>
                    </ul>
                    <!-- CopyRight -->
                </div>
            </footer>
            <!-- Footer -->
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
        @include('sweetalert::alert')
        @include('sweet::alert')
</body>
<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:24 GMT -->

</html>