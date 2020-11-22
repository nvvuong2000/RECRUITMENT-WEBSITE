@extends('home_layout')
@section('home_content')
<div class="careerfy-main-content">

    <!-- Main Section -->
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
                                <!-- <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li> -->
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
                        <form class="careerfy-employer-dasboard" action="{{URL::to('/thaydoimatkhau')}}" method="post">
                            {{csrf_field()}}
                            <div class="careerfy-employer-box-section">

                                <div class="careerfy-profile-title">
                                    <h2>Change Password</h2>
                                </div>
                                <ul class="careerfy-row careerfy-employer-profile-form">
                                    <input value="{{$_SESSION['id']}}" name="id_user" type="hidden">
                                    <li class="careerfy-column-12">
                                        <label>Old Password *</label>
                                        <input value="oldPassword" name="oldPassword" type="password">
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>New Password *</label>
                                        <input value=" newPassword" name="newPassword" type="password">
                                    </li>
                                    <li class="careerfy-column-6">
                                        <label>Confirm New Password *</label>
                                        <input value="confirmPassword" name="confirmPassword" type="password">
                                    </li>
                                </ul>

                            </div>
                            <input type="submit" class="careerfy-employer-profile-submit" value="Update Password">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Section -->

</div>
<!-- Main Content -->

<!-- Footer -->
<footer id="careerfy-footer" class="careerfy-footer-one">
    <div class="container">
        <!-- Footer Widget -->
        <div class="careerfy-footer-widget">
            <div class="row">
                <aside class="widget col-md-4 widget_contact_info">
                    <div class="widget_contact_wrap">
                        <a class="careerfy-footer-logo" href="index.html"><img src="images/footer-logo.png" alt=""></a>
                        <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper. Sed coquat sapien faucibus quam.</p>
                        <a href="#" class="careerfy-classic-btn careerfy-bgcolor">Learn more</a>
                    </div>
                </aside>
                <aside class="widget col-md-3 widget_nav_manu">
                    <div class="footer-widget-title">
                        <h2>Quick Links</h2>
                    </div>
                    <ul>
                        <li><a href="#">Shortcodes</a></li>
                        <li><a href="#">Job Page</a></li>
                        <li><a href="#">Job Page Alternative</a></li>
                        <li><a href="#">Resume Page</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </aside>
                <aside class="widget col-md-3 widget_nav_manu">
                    <div class="footer-widget-title">
                        <h2>For Candidates</h2>
                    </div>
                    <ul>
                        <li><a href="#">Browse Jobs</a></li>
                        <li><a href="#">Browse Categories</a></li>
                        <li><a href="#">Submit Resume</a></li>
                        <li><a href="#">Candidate Dashboard</a></li>
                        <li><a href="#">Job Alerts</a></li>
                        <li><a href="#">My Bookmarks</a></li>
                    </ul>
                </aside>
                <aside class="widget col-md-2 widget_nav_manu">
                    <div class="footer-widget-title">
                        <h2>For Employers</h2>
                    </div>
                    <ul>
                        <li><a href="#">Browse Candidates</a></li>
                        <li><a href="#">Employer Dashboard</a></li>
                        <li><a href="#">Add Job</a></li>
                        <li><a href="#">Job Packages</a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <!-- Footer Widget -->
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
        </div>
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
                            <img src="extra-images/login-robot.png" alt="">
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
@endsection