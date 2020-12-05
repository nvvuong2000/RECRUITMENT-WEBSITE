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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/app1.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

    <HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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

    <div class="main">

        <section class="signup">

            <div class="container" style="    width: 600px;">
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

                    @if(session()->has('message'))
                    <div class="alert alert-info text-center " style="font-size:16px">
                        {{ session()->get('message') }} </div> @endif <div class="signup-content">
                        <form method="POST" action="{{URL::to('/dang-ki-ntd')}}" id="signup-form" class="signup-form">

                            {{csrf_field()}}
                            <!-- <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Thông tin cơ bản</a> -->
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
                                    <input type="date" class="form-input" name="user_ngaysinh" id="birth_date" />
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
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-input" name="user_email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-input" name="user_diachi" id="email" />
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
                            <!-- <div class="form-text">
                                <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Thông tin nhà tuyển dụng</a> -->

                            <div class="form-group">
                                <label for="phone_number">Tên Doanh nghiệp</label>
                                <input type="text" class="form-input" name="tendoanhnghiep" id="phone_number" />
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="number">Doanh nghiệp SDT</label>
                                    <input type="number" class="form-input" name="doanhnghiep_sdt" id="password" />
                                </div>
                                <div class="form-group">
                                    <label for="number">Doanh nghiệp Fax </label>
                                    <input type="number" class="form-input" name="doanhnghiep_fax" id="re_password" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="number">Doanh nghiệp Email </label>
                                    <input type="email" class="form-input" name="doanhnghiep_email" id="re_password" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Doanh nghiệp Websibe</label>
                                    <input type="text" class="form-input" name="doanhnghiep_website" id="email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Doanh nghiệp mô tả</label>
                                <textarea type="text" class="form-control" name="doanhnghiep_mota" id="email" rows="4" cols="50"> </textarea>
                            </div>

                            <div class="form-group">
                                <label for="email">Địa chỉ</label>
                                <input type="text" class="form-input" name="diachi" id="email" />
                            </div>


                            <div class="form-group">
                                <label for="country">Ngành nghề</label>
                                <div class="select-list">
                                    <select name="id_loainganhnghe">
                                        @foreach($loainganhnghe ?? '' as $key =>$nganhnghe)
                                        <option value="{{$nganhnghe->nganhnghe_id}}">{{$nganhnghe->nganhnghe_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class=" btn btn-primary btn-block waves-effect waves-light form-submit" value="Submit" />
                            </div>
                        </form>
                        <div class="mt-4 text-center" style="margin-top: 32px;">
                            
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-4 text-center" style="margin-top: 32px;">
                
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Đã có tài khoản ? <a href="{{URL :: to('/dang-nhap')}}" class="font-weight-medium text-primary"> Đăng nhập</a> </p>
                    <p> Đăng kí với tư cách ứng viên ? <a href="{{URL :: to('/dang-ki-uv')}}" class="font-weight-medium text-primary"> Đăng kí</a> </p>
                    
                </div>
            </div>

    </div>


</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Mirrored from eyecix.com/html/careerfy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Nov 2020 10:38:24 GMT -->

</html>