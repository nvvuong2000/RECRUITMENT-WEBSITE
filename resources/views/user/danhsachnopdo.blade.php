@extends('home_layout')
@section('home_content')
<!-- Main Content -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerfy</title>
    <script src="{{'public/frontend/script/jquery.js'}}"></script>
    <script src="{{'public/frontend/script/bootstrap.js'}}"></script>
    <script src="{{'public/frontend/script/slick-slider.js'}}"></script>
    <script src="{{'public/frontend/script/counter.js'}}"></script>
    <script src="{{'public/frontend/script/progressbar.js'}}"></script>
    <script src="{{'public/frontend/script/fancybox.pack.js'}}"></script>
    <script src="{{'public/frontend/script/isotope.min.js'}}"></script>
    <script src="{{'public/frontend/script/functions.js'}}"></script>
    <script src="{{'public/frontend/script/functions.js'}}"></script>

    <!-- Css -->
    <link href="{{('public/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/slick-slider.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/fancybox.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/plugin.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/color.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="careerfy-main-content">
    <div class="careerfy-main-section careerfy-dashboard-fulltwo">
        <div class="container">
            <div class="row">

                <aside class="careerfy-column-3">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dashboard-nav">
                            <figure>
                                <a href="#" class="employer-dashboard-thumb"><img src="extra-images/employer-dashboard-1.png" alt=""></a>
                                <figcaption>
                                    <div class="careerfy-fileUpload">
                                        Upload Photo</span>
                                        <input type="file" class="careerfy-upload" />
                                    </div>
                                    <h2></h2>
                                </figcaption>
                            </figure>
                            <ul>
                                <li class="active"><a href="{{URL::to('//thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                                <!-- <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li> -->
                                <li><a href="{{URL::to('/danhsach-ungtuyen')}}"> Danh sách ứng tuyển</a></li>

                                <li><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                                <li><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>

                                <li><a href="{{URL::to('/thaydoimatkhau')}}"> Đổi mật khẩu</a></li>
                                <li><a href="{{URL::to('/dangxuat')}}"> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>

                </aside>
                <div class="careerfy-column-9">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dasboard">
                            <div class="careerfy-employer-box-section">
                                <!-- Profile Title -->
                                <div class="careerfy-profile-title">
                                    <h2>Danh sách ứng viên</h2>
                                    <form class="careerfy-employer-search">
                                        <input value="Search orders" onblur="if(this.value == '') { this.value ='Search orders'; }" onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                        <input type="submit" value="">
                                        <i class="careerfy-icon careerfy-search"></i>
                                    </form>
                                </div>
                                <!-- Resumes -->
                                <div class="careerfy-employer-resumes">
                                    <ul class="careerfy-row">
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Samantha Cindy</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Web Developer at <a href="#">Vivatam</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $1900/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Kyl San Antonio</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Charity & Voluntary at <a href="#">Unodoncity</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $2000/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Daniel Nguyen</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Financial Services at <a href="#">Graveholdings</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $15000/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Vodka beluga</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Engineering at <a href="#">Vsmarttech</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $3000/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Rai Yamoto</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Development Manager at <a href="#">AOEVN</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $50000/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="careerfy-column-6">
                                            <div class="careerfy-employer-resumes-wrap">
                                                <figure>
                                                    <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                    <figcaption>
                                                        <h2><a href="#">Mary C Stanford</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
                                                        <span class="careerfy-resumes-subtitle">Web Designer at <a href="#">TheOne Co</a></span>
                                                        <ul>
                                                            <li>
                                                                <span>Location:</span>
                                                                Netherlands, Rotterdam
                                                            </li>
                                                            <li>
                                                                <span>Current Salary:</span>
                                                                $4000/<small>p.a minimum</small>
                                                            </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                                <ul class="careerfy-resumes-options">
                                                    <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> Message</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> View Profile</a></li>
                                                    <li><a href="#"><i class="careerfy-icon careerfy-linkedin-1"></i> LinkedIn</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Pagination -->
                                <div class="careerfy-pagination-blog">
                                    <ul class="page-numbers">
                                        <li><a class="prev page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                        <li><span class="page-numbers current">01</span></li>
                                        <li><a class="page-numbers" href="#">02</a></li>
                                        <li><a class="page-numbers" href="#">03</a></li>
                                        <li><a class="page-numbers" href="#">04</a></li>
                                        <li><a class="next page-numbers" href="#"><span><i class="careerfy-icon careerfy-arrows4"></i></span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Section -->

</div>
<!-- Main Content -->
@endsection