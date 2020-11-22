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
    <link href="{{asset('public/frontend/css//material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{URL::to('/dang-ki-uv')}}" id="signup-form" class="signup-form">
                        {{csrf_field()}}
                        <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Thông tin cơ bản</a>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">Họ và Tên</label>
                                <input type="text" class="form-input" name="user_hoten" id="first_name" />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Username</label>
                                <input type="text" class="form-input" name="user_taikhoan" id="last_name" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-icon">
                                <label for="birth_date">Ngày sinh</label>
                                <input type="text" class="form-input" name="user_ngaysinh" id="birth_date" placeholder="MM-DD-YYYY" />
                            </div>
                            <div class="form-radio">
                                <label for="gender">Giới tính</label>
                                <div class="form-flex">
                                    <input type="radio" name="gender" value="1" id="male" checked="checked" />
                                    <label for="male">Nam</label>

                                    <input type="radio" name="gender" value="2" id="female" />
                                    <label for="female">Nữ</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại</label>
                            <input type="number" class="form-input" name="user_sdt" id="phone_number" />
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-input" name="user_mk" id="password" />
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" class="form-input" name="user_re_mk" id="re_password" />
                            </div>
                        </div>
                        <div class="form-text">
                            <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Thông tin ứng viên</a>
                            <div class="add_info">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-input" name="user_email" id="email" />
                                </div>
                                <div class="form-group">
                                    <label for="diachi">Địa chỉ</label>
                                    <input type="text" class="form-input" name="user_diachi" id="email" />
                                </div>

                                <div class="form-group">
                                    <label for="country">Thành phố</label>
                                    <div class="select-list">
                                        <select name="thanhpho_id">
                                            @foreach($tinhthanh as $key =>$tinhthanh)
                                            <option value="{{$tinhthanh->tinhthanh_id}}">{{$tinhthanh->tinhthanh_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Ngành nghề</label>
                                    <div class="select-list">
                                        <select name="nganhnghe_id">
                                            @foreach($loainganhnghe as $key =>$nganhnghe)
                                            <option value="{{$nganhnghe->nganhnghe_id}}">{{$nganhnghe->nganhnghe_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">Kinh nghiệm</label>
                                    <div class="select-list">
                                        <select name="id_kinhnghiem" require>
                                            @foreach($kinhnghiem as $key =>$kinhnghiem)
                                            <option value="{{$kinhnghiem->kinhnghiem_id}}">{{$kinhnghiem->kinhnghiem_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">Bằng cấp</label>
                                    <div class="select-list">
                                        <select name="id_bangcap">
                                            @foreach($bangcap as $key =>$bangcap)
                                            <option value="{{$bangcap->bangcap_id}}">{{$bangcap->bangcap_ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">Hình thức</label>
                                    <div class="select-list">
                                        <select name="hinhthuc_id" require>
                                            @foreach($hinhthuclamviec as $key =>$hinhthuc)
                                            <option value="{{$hinhthuc->hinhThuc_id}}">{{$hinhthuc->hinhThuc_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
                        </div>
                    </form>
                    <a class="add-info-link" href="{{URL :: to('/dang-nhap')}}">ĐĂNG NHẬP</a>
                    <a class="add-info-link" href="{{URL :: to('/dang-ki-ntd')}}">Đăng kí với tư cách nhà tuyển dụng</a>
                </div>
            </div>
        </section>

    </div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{('public/frontend/script/jquery.js')}}"></script>
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
<script src="{{('public/frontend/script/main.js')}}"></script>

<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:24 GMT -->

</html>