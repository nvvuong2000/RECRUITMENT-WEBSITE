@extends('home_layout')
@section('home_content')
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
    <link href="{{('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel="stylesheet}}">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
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
                                        <li class="active"><a href="{{URL::to('/thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                                        <li><a href="{{URL::to('/danhsach-ungtuyen')}}"> Danh sách ứng tuyển</a></li>
                                    
                                        <li><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                                        <li><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>
                                        
                                        <li><a href="candidate-dashboard-changed-password.html"> Đổi mật khẩu</a></li>
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
                                            <h2>Quản lý công việc</h2>
                                            
                                        </div>
                                        <!-- Manage Jobs -->
                                        <div class="careerfy-managejobs-list-wrap">
                                            <div class="careerfy-managejobs-list">
                                                <!-- Manage Jobs Header -->
                                                <div class="careerfy-table-layer careerfy-managejobs-thead">
                                                    <div class="careerfy-table-row">
                                                        <div class="careerfy-table-cell">Tiêu đề</div>
                                                        <div class="careerfy-table-cell">Số lượt ứng tuyển</div>
                                                       
                                                        <div class="careerfy-table-cell">Trạng thái</div>
                                                        <div class="careerfy-table-cell"></div>
                                                    </div>
                                                </div>
                                                <!-- Manage Jobs Body -->
                                                @foreach($luu_tintd as $key => $luu)
                                                <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                                    <div class="careerfy-table-row">
                                                         
                                                        <div class="careerfy-table-cell">
                                                            <h6><a href="#">{{$luu->TieuDe}}</a></h6>
                                                            <ul>
                                                                
                                                                <li> Thời hạn: <span>{{$luu->hannophoso}}</span></li>
                                                                 {{$luu->gioitinh}}</li>
                                                                <li></i> <a href="#">{{$luu->diachi}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="careerfy-table-cell"><a href="#" class="careerfy-managejobs-appli">4 Application(s)</a></div>
                                                       
                                                        <div class="careerfy-table-cell"><span class="careerfy-managejobs-option">Pending</span></div>
                                                        <div class="careerfy-table-cell">
                                                            <div class="careerfy-managejobs-links">
                                                                <a href="{{URL ::to('/chitiet-tintuyendung/'.$luu->id_tintuyendung)}}" class="careerfy-managejobs-option">Xem</a>
                                                                <a href="#" class="careerfy-managejobs-option">Sửa</a>
                                                                <a href="#" class="careerfy-managejobs-option">Xóa</a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                               @endforeach
                                              
                                            </div>
                                        </div>
                                       

                                    </div>
                                </div>
                            </div>
                        </div>

                    
             
            


@endsection