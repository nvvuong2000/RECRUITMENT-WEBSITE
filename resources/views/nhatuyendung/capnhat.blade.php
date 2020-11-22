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
    <link href="{{('public/frontend/css/https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext,vietnamese')}} rel=" stylesheet}}">

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
                            <li><a href="{{URL::to('/danh-sach-ung-tuyen/'.$_SESSION['id'])}}"> Danh sách ứng tuyển</a></li>
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
                        <form action="{{url::to('/luu-tintuyendung')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id_tintuyendung" value="{{$id}}" />
                            <div class="careerfy-employer-box-section">
                                <!-- Profile Title -->
                                <div class="careerfy-profile-title">
                                    <h2>Cập nhật công việc</h2>
                                    <?php

                                    $message = Session::get('message');
                                    if ($message) {
                                        echo $message;
                                        Session::put('message', null);
                                    }

                                    // echo $suatintd;
                                    echo $chitiet_tintd
                                    ?>
                                </div>
                                <!-- New Job -->

                                @foreach($chitiet_tintd as $key => $td)
                                <ul class="careerfy-row careerfy-employer-profile-form">
                                    <li class="careerfy-column-6">

                                        <label>Tiêu đề cho công việc</label>
                                        <input name="tieude" value="{{$td->tieude}}" type="text">


                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Thời hạn nộp hồ sơ</label>
                                        <input name="thoihan" value="{{$td->hannophoso}}" type="text">
                                    </li>
                                    <li class="careerfy-column-12">
                                        <label>Mô tả công việc *</label>
                                        <textarea name="mota" value="{{$td->mota}}"></textarea>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Địa chỉ email</label>
                                        <div class="careerfy-profile-select">
                                            <input name=email type="email" value="{{$td->email}}" />
                                        </div>
                                    </li>

                                    <li class="careerfy-column-6">
                                        <label>Loại ngành nghề</label>
                                        <div class="careerfy-profile-select">
                                            <select name="loai">

                                                @foreach($loainganhnghe as $key =>$nganhnghe)
                                                <!-- <option value="{{$nganhnghe->nganhnghe_id}}">{{$nganhnghe->nganhnghe_name}}</option> -->

                                                <option value="{{$nganhnghe->nganhnghe_id}}" <?php
                                                                                                if ($nganhnghe->nganhnghe_id == $td->id_loainganhnghe) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>>{{$nganhnghe->nganhnghe_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">

                                        <label>Hình thức làm việc</label>
                                        <div class="careerfy-profile-select">
                                            <select name="hinhthuc">
                                                @foreach($hinhthuclamviec as $key =>$hinhthuc)

                                                <option value="{{$hinhthuc->hinhThuc_id}}" <?php
                                                                                            if ($hinhthuc->hinhThuc_id == $td->id_hinhthuclamviec) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>>{{$hinhthuc->hinhThuc_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Chức vụ</label>
                                        <div class="careerfy-profile-select">
                                            <select name="chucvu">

                                                @foreach($chucvu as $key =>$chucvu)
                                                <option value="{{$chucvu->chucvu_id}}" <?php
                                                                                        if ($chucvu->chucvu_id == $td->id_chucvu) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>>{{$chucvu->chucvu_ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Giới tính</label>
                                        <div class="careerfy-profile-select">
                                            <select name="gioitinh">
                                                <option>Nam</option>
                                                <option>Nữ</option>
                                                <option>Nam và nữ</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Mức lương</label>
                                        <div class="careerfy-profile-select">
                                            <select name="mucluong">
                                                @foreach($mucluong as $key =>$mucluong)
                                                <?php
                                                if ($mucluong->mucluong_id == $td->id_mucluong) {
                                                    echo 'selected';
                                                } else {
                                                    echo '';
                                                } ?>
                                                <option value="{{$mucluong->mucluong_id}}" <?php
                                                                                            if ($mucluong->mucluong_id == $td->id_mucluong) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>>{{$mucluong->mucluong_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>

                                    <li class="careerfy-column-6">
                                        <label>Kinh nghiệm</label>
                                        <div class="careerfy-profile-select">
                                            <select name="kinhnghiem">

                                                @foreach($kinhnghiem as $key =>$kinhnghiem)
                                                <option value="{{$kinhnghiem->kinhnghiem_id}}" <?php
                                                                                                if ($kinhnghiem->kinhnghiem_id == $td->id_kinhnghiem) {
                                                                                                    echo 'selected';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?>>{{$kinhnghiem->kinhnghiem_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Bằng cấp</label>
                                        <div class="careerfy-profile-select">
                                            <select name="bangcap">
                                                @foreach($bangcap as $key =>$bangcap)

                                                <option value="{{$bangcap->bangcap_id}}" <?php
                                                                                            if ($bangcap->bangcap_id == $td->id_bangcap) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?>>{{$bangcap->bangcap_ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>

                                    <li class="careerfy-column-6">
                                        <label>Tỉnh/thành phố *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="tinhthanh">
                                                @foreach($tinhthanh as $key =>$tinhthanh)
                                                <option value="{{$tinhthanh->tinhthanh_id}}" selected=" <?php $tinhthanh->tinhthanh_id == $td->id_tinhthanh ? 'selected' : ''; ?>">{{$tinhthanh->tinhthanh_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Số lượng tuyển</label>
                                        <input name="soluong" value="{{$td->soluong}}" type="text">
                                    </li>

                                    <li class="careerfy-column-10">
                                        <label>Địa chỉ </label>
                                        <div class="careerfy-profile-select">
                                            <input name="diachi" type="text" value="{{$td->diachi}}" />
                                        </div>
                                    </li>
                                    <li class="careerfy-column-2">
                                        <button class="careerfy-findmap-btn">Find on Map</button>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Latitude</label>
                                        <input value="" type="text">
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Longitude</label>
                                        <input value="-0.16803379999998924" onblur="if(this.value == '') { this.value ='-0.16803379999998924'; }" onfocus="if(this.value =='-0.16803379999998924') { this.value = ''; }" type="text">
                                    </li>
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-profile-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe></div>
                                        <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                                    </li>
                                </ul>
                                @endforeach
                            </div>

                            <input type="submit" class="careerfy-employer-profile-submit" value="Cập nhật tin tuyển dụng">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection