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
                                <span class="careerfy-jobdetail-listthumb"><img src="extra-images/job-detail-logo-1.png" alt=""></span>
                                <figcaption>
                                    <h2>{{$chitiet->TieuDe}}</h2>

                                    <span><small class="careerfy-jobdetail-type">{{$chitiet->hinhThuc_name}}</small> {{$chitiet->tendoanhnghiep}} <small class="careerfy-jobdetail-postinfo">Posted now</small></span>
                                    <ul class="careerfy-jobdetail-options">
                                        <li><i class="fa fa-map-marker"></i> {{$chitiet->diachi}}<a href="#" class="careerfy-jobdetail-view">View om Map</a></li>

                                        <li><i class="careerfy-icon careerfy-calendar"></i> Thoi han: {{$chitiet->hannophoso}}</li>
                                        <li><i class="careerfy-icon careerfy-summary"></i> Applications 4</li>

                                    </ul>
                                    <a href="#" class="careerfy-jobdetail-btn active"><i class="careerfy-icon careerfy-add-list"></i> Shortlist</a>
                                    <a href="#" class="careerfy-jobdetail-btn"><i class="careerfy-icon careerfy-envelope"></i> Email:{{$chitiet->email}}</a>

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
                                    <h2>Chi tiet cong viec</h2>
                                </div>
                                <div class="careerfy-jobdetail-services">
                                    <ul class="careerfy-row">
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Mức lương <small>{{$chitiet->mucluong_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Vị trí tuyển <small>{{$chitiet->chucvu_ten}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Kinh nghiệm <small>{{$chitiet->kinhnghiem_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Giới tính <small>{{$chitiet->gioitinh}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Lĩnh vực <small>{{$chitiet->nganhnghe_name}}</small></div>
                                        </li>
                                        <li class="careerfy-column-4">

                                            <div class="careerfy-services-text">Qualification <small>Master’s Degree</small></div>
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
                                <h2>Other jobs you may like</h2>
                            </div>
                            <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                                <ul class="careerfy-row">
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="extra-images/job-listing-logo-1.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="#">Need Senior Rolling Stock Technician</a> <span>Featured</span></h2>
                                                    <ul>
                                                        <li><a href="#">@ Massimo Artemisis</a></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> Netherlands, Rotterdam</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Sales & Marketing</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    <a href="#" class="careerfy-option-btn">Freelance</a>
                                                    <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="extra-images/job-listing-logo-2.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="#">Job in Computer Information Tech</a></h2>
                                                    <ul>
                                                        <li><a href="#">@ Sapient</a></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> Netherlands, Rotterdam</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Development</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    <a href="#" class="careerfy-option-btn careerfy-blue">Full time</a>
                                                    <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="extra-images/job-listing-logo-3.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="#">Website Information Officer Required</a></h2>
                                                    <ul>
                                                        <li><a href="#">@ Mindshare</a></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> Netherlands, Rotterdam</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Telecommunication</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    <a href="#" class="careerfy-option-btn careerfy-red">Temporary</a>
                                                    <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="extra-images/job-listing-logo-4.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="#">Junior Support Engineer VBA</a> <span>Featured</span></h2>
                                                    <ul>
                                                        <li><a href="#">@ Disneyland</a></li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> Netherlands, Rotterdam</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Food Services</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    <a href="#" class="careerfy-option-btn">Freelance</a>
                                                    <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <div class="careerfy-joblisting-classic-wrap">
                                            <figure><a href="#"><img src="extra-images/job-listing-logo-5.png" alt=""></a></figure>
                                            <div class="careerfy-joblisting-text">
                                                <div class="careerfy-list-option">
                                                    <h2><a href="{{URL::to('/nop-don')}}">Technology Senior Officer Norway Office</a></h2>
                                                    <ul>
                                                        <li><a href=" #">@ LK Collections</a>
                                                        </li>
                                                        <li><i class="careerfy-icon careerfy-maps-and-flags"></i> Netherlands, Rotterdam</li>
                                                        <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> Health Care</li>
                                                    </ul>
                                                </div>
                                                <div class="careerfy-job-userlist">
                                                    <a href="#" class="careerfy-option-btn careerfy-green">Part time</a>
                                                    <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
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
                                    <a href="{!! route('nopdon', ['id_doanhnghiep'=>$chitiet->id_doanhnghiep, 'id_ungvien'=>$_SESSION['id'],'id_tintuyendung'=>$chitiet->id_tintuyendung]) !!}" class="careerfy-applyjob-btn">Apply for the job</a>
                                    <span>Application ends in 4d 5h 3m</span>
                                    <div class="careerfy-applywith-title"><small>OR apply with</small></div>
                                    <p>Know someone who would be perfect for this role this role? Be a pal, let them know.</p>
                                    <ul>
                                        <li><a href="#"><i class="careerfy-icon careerfy-facebook-logo-1"></i> Facebook</a></li>
                                        <li><a href="#"><i class="careerfy-icon careerfy-linkedin-logo"></i> LinkedIn</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="careerfy-sendmessage-btn"><i class="careerfy-icon careerfy-envelope"></i> Send a message</a>
                            </div>
                            <div class="widget jobsearch_widget_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe>
                            </div>
                            <div class="widget widget_add">
                                <img src="extra-images/jobdetail-add.jpg" alt="">
                            </div>
                            <div class="widget widget_view_jobs">
                                <div class="careerfy-widget-title">
                                    <h2>More Jobs from Allied Group</h2>
                                </div>
                                <ul>
                                    <li>
                                        <h6><a href="#">Electrical & Mechanical Engineer / Site Maintenance Technician</a></h6>
                                        <span>£32,000 - £35,000 per annum</span>
                                        <small>Netherlands, Rotterdam</small>
                                    </li>
                                    <li>
                                        <h6><a href="#">Electrical Maintenance Engineer PLCs</a></h6>
                                        <span>£25,000 - £33,000 per annum</span>
                                        <small>London, United Kingdom</small>
                                    </li>
                                    <li>
                                        <h6><a href="#">Electrical Maintenance Engineer FMCG Manufacturer</a></h6>
                                        <span>£30,000 - £33,000 per annum</span>
                                        <small>Sutton-in-Ashfield, Nottinghamshire</small>
                                    </li>
                                </ul>
                                <a href="#" class="widget_view_jobs_btn">View all jobs <i class="careerfy-icon careerfy-arrows32"></i></a>
                            </div>
                        </div>
                    </aside>
                    <!-- Job Detail SideBar -->
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