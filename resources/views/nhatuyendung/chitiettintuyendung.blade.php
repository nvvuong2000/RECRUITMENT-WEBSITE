@extends('home_layout')
@section('home_content')
<div class="careerfy-wrapper">


    <!-- Main Content -->
    <div class="careerfy-main-content">
        @foreach($chitiet_tintd as $key => $chitiet)
        <!-- Main Section -->
        <div class="careerfy-main-section">
            <div class="container">
                <div class="row">

                    <!-- Job Detail List -->
                    <div class="careerfy-column-12">
                        <div class="careerfy-typo-wrap">
                            <input value="{{$chitiet->id_doanhnghiep}}" type="hidden" />
                            <input value="{{$chitiet->id_tintuyendung}}" type="hidden" />
                            <figure class="careerfy-jobdetail-list">
                                <span class="careerfy-jobdetail-listthumb"><img src="{{$chitiet->link}}" alt=""></span>
                                <figcaption>
                                    <h2>{{$chitiet->TieuDe}}</h2>

                                    <span><small class="careerfy-jobdetail-type">{{$chitiet->hinhThuc_name}}</small><a class="careerfy-jobdetail-postinfo" href="{{URL::to('/thongtin-doanhnghiep/'.$chitiet->id_doanhnghiep)}}"> {{$chitiet->tendoanhnghiep}}</a>
                                        <ul class="careerfy-jobdetail-options">
                                            <li><i style="color:#13b5ea" class="fas fa-map-marker"></i><strong>Địa chỉ:</strong> {{$chitiet->diachi}}

                                            <li><i class="fas fa-clock"></i><strong>Thời hạn:</strong> {{$chitiet->hannophoso}}</li>
                                            <!-- <li><i class="careerfy-icon careerfy-summary"></i> Applications 4</li> -->

                                        </ul>
                                        <a href="#" class="careerfy-jobdetail-btn active"><i class="fas fa-phone"></i><strong>SĐT:</strong> {{$chitiet->doanhnghiep_sdt}}</a>
                                        <a href="#" class="careerfy-jobdetail-btn"><i class="fas fa-envelope-open"></i> <strong>Email:</strong>{{$chitiet->email}}</a>

                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <!-- Job Detail List -->
                    <!-- Job Detail Content -->
                    <div class="careerfy-column-8">
                        <div class="careerfy-typo-wrap">
                            <div class="careerfy-jobdetail-content">
                                <div class="careerfy-content-title">
                                    <h2>Chi tiết công việc</h2>
                                </div>
                                <div class="careerfy-jobdetail-services">
                                    <ul class="careerfy-row">
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"><strong> Mức lương </strong> <small>{{$chitiet->mucluong_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"> <strong> Vị trí tuyển </strong><small>{{$chitiet->chucvu_ten}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"><strong> Kinh nghiệm </strong> <small>{{$chitiet->kinhnghiem_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"><strong> Giới tính </strong><small>{{$chitiet->gioitinh}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"> <strong> Lĩnh vực </strong> <small>{{$chitiet->nganhnghe_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text"><strong> Bằng cấp </strong><small>{{$chitiet->bangcap_ten}}
                                                </small> </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="careerfy-content-title">
                                    <h2>Mô tả công việc</h2>
                                </div>
                                <div class="careerfy-description">
                                    {{$chitiet->mota}}
                                </div>



                            </div>
                            <div class="careerfy-section-title">
                                <h2>MỘT SỐ CÔNG VIỆC KHÁC</h2>
                            </div>
                            <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                                <ul class="careerfy-row">
                                    @foreach($hienthi_tintd as $key => $hienthi)
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="{{$hienthi->link}}" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="{{URL ::to('/chitiet-tintuyendung/'.$hienthi->id_tintuyendung)}}">{{$hienthi->TieuDe}}</a></h2>
                                                    <ul>
                                                        <li><a href="{{URL::to('/thongtin-doanhnghiep/'.$hienthi->id_doanhnghiep)}}">@ {{$hienthi->tendoanhnghiep}}</a></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> {{$hienthi->diachi}}</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> {{$hienthi->nganhnghe_name}}</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    @if($hienthi->hinhThuc_id==1)
                                                    <a href="#" class="careerfy-option-btn">{{$hienthi->hinhThuc_name}}</a>;

                                                    @elseif($hienthi->hinhThuc_id==2)
                                                    <a href="#" class="careerfy-option-btn careerfy-red">{{$hienthi->hinhThuc_name}}</a>

                                                    @else
                                                    <a href="#" class="careerfy-option-btn careerfy-green">{{$hienthi->hinhThuc_name}}</a>

                                                    @endif
                                                    <!-- <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a> -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Job Detail Content -->
                    <!-- Job Detail SideBar -->
                    <aside class="careerfy-column-4">
                        <div class="careerfy-typo-wrap">
                            <div class="widget widget_apply_job">
                                <div class="widget_apply_job_wrap">


                                    <?php
                                    if (isset($_SESSION["id_quyen"])) {
                                        if ($_SESSION["id_quyen"] == 0) {
                                            $today = date('Y-m-d');
                                            $hannop = $chitiet->hannophoso;
                                            if ($hannop < $today) {
                                                echo  "<a href='#' style='{pointer-events: none; cursor: default;}' readony class='careerfy-applyjob-btn'>Hết hạn</a>";
                                            } else {
                                                $link = route('nopdon', ['id_doanhnghiep' => $chitiet->id_doanhnghiep, 'id_ungvien' => $_SESSION['id'], 'id_tintuyendung' => $chitiet->id_tintuyendung]);

                                                // echo "<h1> abc1 </h1>";
                                                echo  "<a href='{$link}'  class='careerfy-applyjob-btn'>Apply for the job</a>";
                                            }
                                        } else if ($_SESSION["id_quyen"] == 1) {
                                        }
                                    }
                                    if (isset($_SESSION["id"])) {
                                    } else {
                                        $link_dang_nhap = URL::to('dang-nhap');


                                        echo  "<a href='$link_dang_nhap'  class='careerfy-applyjob-btn'>Đăng nhập để nộp đơn</a>";
                                    }


                                    ?>

                                    <!-- <span>Application ends in 4d 5h 3m</span> -->

                                </div>


                                <div class="widget widget_view_jobs">
                                    <div class="careerfy-widget-title">
                                        <h2>CÁC LĨNH VỰC KHÁC</h2>
                                    </div>
                                    <ul>
                                        @foreach($hienthi_tintd as $key => $hienthi)
                                        <li>
                                            <h6><a href="{{URL::to('/loai/'.$hienthi->nganhnghe_id)}}">{{$hienthi->nganhnghe_name}}</a></h6>
                                        </li>
                                        @endforeach
                                        <!-- <li>
            
                                    </ul>
                                 
                                </div>
                            </div>
                    </aside>
                    Job Detail SideBar -->
                                </div>
                            </div>
                        </div>
                        <!-- Main Section -->
                        @endforeach
                </div>
                <!-- Main Content -->


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


                    </div>
                </div>
            </div>
            @endsection