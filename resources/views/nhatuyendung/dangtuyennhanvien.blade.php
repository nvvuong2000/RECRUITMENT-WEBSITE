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
                            <a href="#" class="employer-dashboard-thumb"><img style="height:100%" src="{{$user[0]->link}}" alt=""></a>
                        </figure>
                        <ul>
                            <li><a href="{{URL::to('/thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                            <li><a href="{{URL::to('/capnhat-doanhnghiep')}}"></i> Cập nhật doanh nghiệp</a></li>
                            <li><a href="{{URL::to('/danh-sach-ung-tuyen')}}"> Danh sách ứng tuyển</a></li>
                            <li class="active"><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                            <li><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>
                          
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="careerfy-column-9">
                <div class="careerfy-typo-wrap">
                    <div class="careerfy-employer-dasboard">
                        <form action="{{url::to('/luu-tintuyendung')}}" method="post">
                            {{csrf_field()}}
                            <div class="careerfy-employer-box-section">
                                <!-- Profile Title -->
                                <div class="careerfy-profile-title">
                                    <h2>Đăng tuyển công việc</h2>

                                </div>
                                <!-- New Job -->
                                <ul class="careerfy-row careerfy-employer-profile-form">
                                    <li class="careerfy-column-6">
                                        <label>Tiêu đề cho công việc</label>
                                        <input name="tieude" value="" type="text">
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Thời hạn nộp hồ sơ</label>
                                        <!-- <input name="thoihan" value="" type="text"> -->
                                        <input type="date" class="form-input" name="thoihan" id="birth_date" placeholder="MM-DD-YYYY" />
                                    </li>
                                    <li class="careerfy-column-12">
                                        <label>Mô tả công việc *</label>
                                        <textarea name="mota"></textarea>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Địa chỉ email</label>
                                        <div class="careerfy-profile-select">
                                            <input name=email type="email" />
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Loại ngành nghề</label>
                                        <div class="careerfy-profile-select">
                                            <select name="loai">
                                                @foreach($loainganhnghe as $key =>$nganhnghe)
                                                <option value="{{$nganhnghe->nganhnghe_id}}">{{$nganhnghe->nganhnghe_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Hình thức làm việc</label>
                                        <div class="careerfy-profile-select">
                                            <select name="hinhthuc">
                                                @foreach($hinhthuclamviec as $key =>$hinhthuc)
                                                <option value="{{$hinhthuc->hinhThuc_id}}">{{$hinhthuc->hinhThuc_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Chức vụ</label>
                                        <div class="careerfy-profile-select">
                                            <select name="chucvu">
                                                @foreach($chucvu as $key =>$chucvu)
                                                <option value="{{$chucvu->chucvu_id}}">{{$chucvu->chucvu_ten}}</option>
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
                                                <option value="{{$mucluong->mucluong_id}}">{{$mucluong->mucluong_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Kinh nghiệm</label>
                                        <div class="careerfy-profile-select">
                                            <select name="kinhnghiem">
                                                @foreach($kinhnghiem as $key =>$kinhnghiem)
                                                <option value="{{$kinhnghiem->kinhnghiem_id}}">{{$kinhnghiem->kinhnghiem_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Bằng cấp</label>
                                        <div class="careerfy-profile-select">
                                            <select name="bangcap">
                                                @foreach($bangcap as $key =>$bangcap)
                                                <option value="{{$bangcap->bangcap_id}}">{{$bangcap->bangcap_ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Tỉnh/thành phố *</label>
                                        <div class="careerfy-profile-select">
                                            <select name="tinhthanh">
                                                @foreach($tinhthanh as $key =>$tinhthanh)
                                                <option value="{{$tinhthanh->tinhthanh_id}}">{{$tinhthanh->tinhthanh_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Số lượng tuyển</label>
                                        <input name="soluong" value="" type="number">
                                    </li>
                                    <li class="careerfy-column-10">
                                        <label>Địa chỉ </label>
                                        <div class="careerfy-profile-select">
                                            <input name="diachi" type="text" />
                                        </div>
                                    </li>
                                    <li class="careerfy-column-2">
                                        <button class="careerfy-findmap-btn">Find on Map</button>
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Latitude</label>
                                        <input value="51.4935825" onblur="if(this.value == '') { this.value ='51.4935825'; }" onfocus="if(this.value =='51.4935825') { this.value = ''; }" type="text">
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
                            </div>
                            <input type="submit" class="careerfy-employer-profile-submit" value="Thêm tin tuyển dụng">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection